<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

    function __construct()
    {
        $this->load->library("mongo_db");
    }

    function getByEmail($email)
    {

        $res = $this->mongo_db
        ->where('email', strtolower($email))
        ->get('user');

        if($res) return $res[0];
        else return false;
    }

    function authenticate( $email, $password ) {

        $data["email"] = strtolower($email);

        $data["password"] = md5($password);
        
        $user = $this->mongo_db
            ->where($data)
            ->get('user');

        if(isset($user[0]))
        {

            $this->setUserSession( $user[0] );

            return false;

        }

        else return lang("usr_invalid_credential");

    }

    function facebookAuthenticate( $data ){

        $user = $this->getByEmail($data["email"]);

        if($user)
        {

            if(isset($user["facebook_id"]) && $user["facebook_id"] == $data["id"]) {

                $this->setUserSession( $user );

                return false;

            } else {

              $this->mongo_db
                ->where('email', strtolower($data["email"]))
                ->set("facebook_id",  $data["id"])
                ->update("user");

                $user["registerFrom"] = "Facebook";

                $this->sendSigupMail( $user, "signupThirdAddedMail" );

                $this->setUserSession( $user );

                return false;

            }

        } else {

            $this->load->model("mongo_model");
            $newID = $this->mongo_model->newID();

            $passwd = time();

            $this->mongo_db->insert('user',
              array(
                "_id" => $newID
                ,"name" => $data["name"]
                , "email" => strtolower($data["email"])
                , "facebook_id" => $data["id"]
                , "password" => md5($passwd)
                , "kind" => "new"
                )
              );

            $user = $this->getByEmail($data["email"]);
        
            $this->setUserSession( $user );

            $user["registerFrom"] = "Facebook";

            $user["password"] =  $passwd;

            $this->sendSigupMail( $user, "signupThirdMail" );

            return false;

        }

    }

    function linkedinAuthenticate( $data ){

        $user = $this->getByEmail($data["emailAddress"]);

        if($user)
        {

            if(isset($user["linkedin_id"]) && $user["linkedin_id"] == $data["id"]) {

                $this->setUserSession( $user );

                return false;

            } else {

              $this->mongo_db
                ->where('email', strtolower($data["emailAddress"]))
                ->set("linkedin_id",  $data["id"])
                ->update("user");

                $user["registerFrom"] = "Linkedin";

                $this->sendSigupMail( $user, "signupThirdAddedMail" );

                $this->setUserSession( $user );

                return false;

            }

        } else {

            $this->load->model("mongo_model");
            $newID = $this->mongo_model->newID();

            $passwd = time();

            $this->mongo_db->insert('user',
              array(
                "_id" => $newID
                ,"name" => $data["firstName"] . " " . $data["lastName"]
                , "email" => strtolower($data["emailAddress"])
                , "linkedin_id" => $data["id"]
                , "password" => md5($passwd)
                , "kind" => "new"
                )
              );

            $user = $this->getByEmail($data["emailAddress"]);
        
            $this->setUserSession( $user );

            $user["registerFrom"] = "Linkedin";

            $user["password"] =  $passwd;

            $this->sendSigupMail( $user, "signupThirdMail" );

            return false;

        }

    }

    function googleAuthenticate( $data ){

        $user = $this->getByEmail($data["email"]);

        if($user)
        {

            if(isset($user["google_id"]) && $user["google_id"] == $data["id"]) {

                $this->setUserSession( $user );

                return false;

            } else {

              $this->mongo_db
                ->where('email', strtolower($data["email"]))
                ->set("google_id",  $data["id"])
                ->update("user");

                $user["registerFrom"] = "Google";

                $this->sendSigupMail( $user, "signupThirdAddedMail" );

                $this->setUserSession( $user );

                return false;

            }

        } else {

            $this->load->model("mongo_model");
            $newID = $this->mongo_model->newID();

            $passwd = time();

            $this->mongo_db->insert('user',
              array(
                "_id" => $newID
                ,"name" => $data["displayName"]
                , "email" => strtolower($data["email"])
                , "google_id" => $data["id"]
                , "password" => md5($passwd)
                , "kind" => "new"
                )
              );

            $user = $this->getByEmail($data["email"]);
        
            $this->setUserSession( $user );

            $user["registerFrom"] = "Google";

            $user["password"] =  $passwd;

            $this->sendSigupMail( $user, "signupThirdMail" );

            return false;

        }

    }

    function signup($data){

        $user = $this->getByEmail($data["email"]);

        if( ! $user ) {

            $this->load->model("mongo_model");

            $this->load->helper('date');

            $this->mongo_db->insert('user',
                array(
                    "_id" => $this->mongo_model->newID()
                    , "name" => strtolower($data["email"])
                    , "email" => strtolower($data["email"])
                    , "password" => md5($data["password"])
                    , "kind" => "new"
                )
            );

            $user = $this->getByEmail($data["email"]);

            $this->setUserSession( $user );

            $user["registerFrom"] = "Tzadi";

            $user["password"] =  $data["password"];

            $this->sendSigupMail( $user, "signupMail" );

            return false;

        } else {

            if($user["password"] != md5($this->input->post("password"))) {

                $erro = lang("su_theEmail");
                $erro .= " <strong>".$user["email"]."</strong> ";
                $erro .= lang("su_isAlreadyInUse")." ";
                $erro .= lang("su_emailUsedTips");

                return $erro;

            } else {

                $this->setUserSession( $user );

                return false;

            }

        }

    }

    public function finishSignup( $data ){

        if( ! isset( $data["kind"] ) || ( $data["kind"] == "agency" && ( ! isset( $data["name"] ) || ! isset( $data["subdomain"] ) ) ) ) {

            return "favor informar todos os dados";

        } else {

            if( $data["kind"] == "agency" ) {

                $reservedeSubdomains = array("www"
                    , "staging"
                    , "tzadi"
                    , "intranet"
                    , "intranetstaging"
                    , "bruno"
                    , "brunostaging"
                    , "lucas"
                    , "lucasstaging");

                $this->load->model("agency_model");

                if( $this->agency_model->getBySubdomain( $data["subdomain"] ) || in_array( $data["subdomain"], $reservedeSubdomains ) )
                    return "este subdominio ja está em uso";

                else {

                    $agencyID = $this->agency_model->add( $data );

                    $this->mongo_db
                        ->where( '_id', $this->session->userdata("userID") )
                        ->set( array( "kind" => $data["kind"], "agency" => $agencyID ) )
                        ->update("user");

                    $this->session->set_userdata('agencyID', $agencyID);
                    $this->session->set_userdata('agencySubdomain', $data["subdomain"]);
                    $this->session->set_userdata('agencyName', $data["name"]);

                }

            } else {

                $this->mongo_db
                    ->where( '_id', $this->session->userdata("userID") )
                    ->set("kind",  $data["kind"])
                    ->update("user");

            }



            $this->session->set_userdata("userKind", $data["kind"]);

            return false;

        }

    }

    private function sendSigupMail($user, $template){

        $mailContent['subject'] = lang("usr_Welcome") . " - " . $user["name"];

        $mailContent["message"] = $this->load->view("user/".$template, $user, true);

        $mailContent["to"] = $user["email"];

        if($template != "signupThirdAddedMail" && ENVIRONMENT == "tzadi.com")
            $mailContent["bcc"] = "bruno@tzadi.com, lucas@tzadi.com";

        $mailContent["kind"] = "user/signup";

        $this->load->model('mail_model');

        $this->mail_model->queue($mailContent);

    }

    private function setUserSession( $user ){

        if( $user["kind"] == "agency" ) {
            $agency = $this->mongo_db->where("_id", (int) $user["agency"])->get('agency');
            $this->session->set_userdata('agencyID', $user["agency"]);
            $this->session->set_userdata('agencySubdomain', $agency[0]["subdomain"]);
            $this->session->set_userdata('agencyName', $agency[0]["name"]);
        }

        $this->session->set_userdata('userID', $user["_id"]);
        $this->session->set_userdata('userName', $user["name"]);
        $this->session->set_userdata('userEmail', $user["email"]);
        $this->session->set_userdata('userKind', $user["kind"]);

    }

    function resetDatabase(){

        $this->load->model("mongo_model");
        $this->mongo_db->delete_all("user");
        $this->mongo_db->delete_all("file");
        $this->mongo_db->delete_all("product");
        $this->mongo_db->delete_all("supplier");
        $this->mongo_db->delete_all("mail");
        $this->mongo_db->delete_all("agency");
        $this->mongo_db->delete_all("contact");
        $this->mongo_db->delete_all("currency");
        $this->mongo_db->delete_all("customer");
        $this->mongo_db->delete_all("session");
        $this->mongo_db->delete_all("counter");
        $this->mongo_db->set("id", 0)->update('counter');
        $this->mongo_db->insert('counter', array("id" => 0));

    }

}
