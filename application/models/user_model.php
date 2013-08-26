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


            if( isset( $user[0]["identity"] ) )
                $res->url = "http://".$user[0]["identity"].".".ENVIRONMENT;

            else
                $res->url = "http://".ENVIRONMENT;

        }

        else
            $res->error = lang("usr_invalid_credential");

        return $res;

    }

    function facebookAuthenticate( $data ){

        $user = $this->getByEmail($data["email"]);

        if($user)
        {

            if(isset($user["facebook_id"]) && $user["facebook_id"] == $data["id"]) {

                $this->setUserSession( $user );

                if( isset( $user["identity"] ) )
                    $res->url = "http://".$user["identity"].".".ENVIRONMENT;

                else
                    $res->url = "http://".ENVIRONMENT;

            } else {

              $this->mongo_db
                ->where('email', strtolower($data["email"]))
                ->set("facebook_id",  $data["id"])
                ->update("user");

                $user["registerFrom"] = "Facebook";

                $this->sendSigupMail( $user, "signupThirdAddedMail" );

                $this->setUserSession( $user );

                if( isset( $user["identity"] ) )
                    $res->url = "http://".$user["identity"].".".ENVIRONMENT;

                else
                    $res->url = "http://".ENVIRONMENT;

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
                , "img" => "http://".ENVIRONMENT."/assets/img/no_photo_640x480.png"
                )
              );

            $user = $this->getByEmail($data["email"]);
        
            $this->setUserSession( $user );

            $user["registerFrom"] = "Facebook";

            $user["password"] =  $passwd;

            $this->sendSigupMail( $user, "signupThirdMail" );

            $res->url = "http://".ENVIRONMENT;

        }

        return $res;

    }

    function linkedinAuthenticate( $data ){

        $user = $this->getByEmail($data["emailAddress"]);

        if($user)
        {

            if(isset($user["linkedin_id"]) && $user["linkedin_id"] == $data["id"]) {

                $this->setUserSession( $user );

                if( isset( $user["identity"] ) )
                    $res->url = "http://".$user["identity"].".".ENVIRONMENT;

                else
                    $res->url = "http://".ENVIRONMENT;

            } else {

              $this->mongo_db
                ->where('email', strtolower($data["emailAddress"]))
                ->set("linkedin_id",  $data["id"])
                ->update("user");

                $user["registerFrom"] = "Linkedin";

                $this->sendSigupMail( $user, "signupThirdAddedMail" );

                $this->setUserSession( $user );

                if( isset( $user["identity"] ) )
                    $res->url = "http://".$user["identity"].".".ENVIRONMENT;

                else
                    $res->url = "http://".ENVIRONMENT;

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
                , "img" => "http://".ENVIRONMENT."/assets/img/no_photo_640x480.png"
                )
              );

            $user = $this->getByEmail($data["emailAddress"]);
        
            $this->setUserSession( $user );

            $user["registerFrom"] = "Linkedin";

            $user["password"] =  $passwd;

            $this->sendSigupMail( $user, "signupThirdMail" );

            $res->url = "http://".ENVIRONMENT;

        }

        return $res;

    }

    function googleAuthenticate( $data ){

        $user = $this->getByEmail($data["email"]);

        if($user)
        {

            if(isset($user["google_id"]) && $user["google_id"] == $data["id"]) {

                $this->setUserSession( $user );

                if( isset( $user["identity"] ) )
                    $res->url = "http://".$user["identity"].".".ENVIRONMENT;

                else
                    $res->url = "http://".ENVIRONMENT;


            } else {

              $this->mongo_db
                ->where('email', strtolower($data["email"]))
                ->set("google_id",  $data["id"])
                ->update("user");

                $user["registerFrom"] = "Google";

                $this->sendSigupMail( $user, "signupThirdAddedMail" );

                $this->setUserSession( $user );

                if( isset( $user["identity"] ) )
                    $res->url = "http://".$user["identity"].".".ENVIRONMENT;

                else
                    $res->url = "http://".ENVIRONMENT;


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
                , "img" => "http://".ENVIRONMENT."/assets/img/no_photo_640x480.png"
                )
              );

            $user = $this->getByEmail($data["email"]);
        
            $this->setUserSession( $user );

            $user["registerFrom"] = "Google";

            $user["password"] =  $passwd;

            $this->sendSigupMail( $user, "signupThirdMail" );

            $res->url = "http://".ENVIRONMENT;

        }

        return $res;

    }

    function signup($data){

        $user = $this->getByEmail($data["email"]);

        if( ! $user ) {

            $this->load->model("mongo_model");

            $this->load->helper('date');

            $name = substr($data["email"], 0, strpos($data["email"], "@"));

            $this->mongo_db->insert('user',
                array(
                    "_id" => $this->mongo_model->newID()
                    , "name" => strtolower($name)
                    , "email" => strtolower($data["email"])
                    , "password" => md5($data["password"])
                    , "kind" => "new"
                    , "img" => "http://".ENVIRONMENT."/assets/img/no_photo_640x480.png"
                    , "register" => now()
                )
            );

            $user = $this->getByEmail($data["email"]);

            $this->setUserSession( $user );

            $user["registerFrom"] = "Tzadi";

            $user["password"] =  $data["password"];

            $this->sendSigupMail( $user, "signupMail" );

            $res->url = "http://".ENVIRONMENT;

        } else {

            if($user["password"] != md5($this->input->post("password"))) {

                $res->error = lang("su_theEmail");
                $res->error .= " <strong>".$user["email"]."</strong> ";
                $res->error .= lang("su_isAlreadyInUse")." ";
                $res->error .= lang("su_emailUsedTips");

            } else {

                $this->setUserSession( $user );

                if( isset( $user["identity"] ) )
                    $res->url = "http://".$user["identity"].".".ENVIRONMENT;

                else
                    $res->url = "http://".ENVIRONMENT;

            }

        }

        return $res;

    }

    public function finishSignup( $user ){

        if( ! isset( $user["kind"] ) || ! isset( $user["name"] ) || ! isset( $user["identity"] ) ) {

            $res->error = "favor informar todos os dados";

        } else {

            if( ! preg_match('/^[a-zA-Z0-9]{1,32}$/', $user["identity"]) ) {

                $res->error = "informe uma identidade válida";

            } else {

                $reservedIdentities = array("www"
                    , "staging"
                    , "intranet"
                    , "intranetstaging"
                    , "blog"
                    , "blogstaging"
                    , "database"
                    , "databasestaging"
                    , "driver"
                    , "driverstaging"
                    , "task"
                    , "taskstaging"
                    , "developer"
                    , "developerstaging"
                    );

                if( $this->getByIdentity( $user["identity"] ) || in_array( $user["identity"], $reservedIdentities ) )
                    $res->error = "esta identidade ja está em uso";

                else {

                    $this->mongo_db
                        ->where( '_id', $this->session->userdata("_id") )
                        ->set(
                            array(
                                "kind" => $user["kind"]
                                , "name" => $user["name"]
                                , "identity" => $user["identity"]
                            )
                        )
                        ->update("user");


                    $this->session->set_userdata('identity', $user["identity"]);
                    $this->session->set_userdata('name', $user["name"]);
                    $this->session->set_userdata("kind", $user["kind"]);

                    $this->sendSigupMail( $this->getByIdentity( $user["identity"]), "finishSignupMail" );

                    switch ($user["kind"]) {
                        case 'student':
                            $res->url = "http://".$user["identity"].".".ENVIRONMENT."/".lang("rt_interests");
                            break;
                        case 'agency ':
                            $res->url = "http://".$user["identity"].".".ENVIRONMENT."/".lang("rt_products");
                            break;
                        case 'supplier':
                            $res->url = "http://".$user["identity"].".".ENVIRONMENT."/".lang("rt_products");
                            break;
                        default:
                            $res->url = "http://".$user["identity"].".".ENVIRONMENT;
                            break;
                    }

                    

                }

            }

        }

        return $res;

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

        $this->session->set_userdata('_id', $user["_id"]);
        $this->session->set_userdata('name', $user["name"]);
        $this->session->set_userdata('email', $user["email"]);
        $this->session->set_userdata('kind', $user["kind"]);
        if( isset( $user["img"] ) ) $this->session->set_userdata('img', $user["img"]);
        if( isset( $user["identity"] ) ) $this->session->set_userdata('identity', $user["identity"]);

    }

      function getByIdentity($identity)
      {

        $identity = strtolower($identity);

        $res = $this->mongo_db
          ->where('identity', $identity)
          ->get('user');

        if($res) return $res[0];

        else return false;

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
        $this->mongo_db->delete_all("blog");
        $this->mongo_db->set("id", 0)->update('counter');
        $this->mongo_db->insert('counter', array("id" => 0));

        $this->load->helper('date');

        $this->mongo_db->insert('user',
            array(
                "_id" => $this->mongo_model->newID()
                , "name" => strtoupper("TZADI")
                , "email" => "admin@tzadi.com"
                , "password" => md5("Dublin2010ireland")
                , "kind" => "student"
                , "register" => now()
                , "identity" => "tzadi"
                , "img" => "http://".ENVIRONMENT."/assets/img/72x72.png"
            )
        );

    }

  function changeImg()
  {

    $_id = $this->session->userdata("_id");

    $this->load->model("file_model");

    $newFile = "http://".ENVIRONMENT."/file/open/".$this->file_model->save( $_id );

    $this->session->set_userdata('img', $newFile);

    $user = $this->mongo_db
      ->where('_id', $_id)
      ->get('user');

    if( isset( $user[0]["img"] ) ) {

        $imgIdPos = strrpos($user[0]["img"], "file/open/");

        $img = substr( $user[0]["img"], $imgIdPos+10,  strlen($user[0]["img"]) );

        if( is_numeric( $img ) )
            $this->file_model->drop( (int) $img );

    }

    $this->mongo_db
      ->where('_id', $_id)
      ->set("img", $newFile)
      ->update("user");

    $res->img = $newFile;

    return $res;
  }

    public function set( $data ){

        $edited = $this->mongo_db
            ->where( '_id', (int) $this->session->userdata("_id") )
            ->set(
                array(
                "name" => $data["name"]
                , "about" => $data["about"]
                , "termsOfUse" => $data["termsOfUse"]
                , "privacyPolicy" => $data["privacyPolicy"]
                )
            )
            ->update("user");

        if( $edited ) {

            $res->success = "Salvo!";

            $this->session->set_userdata('name', $data["name"]);

            $this->session->set_userdata('profileName', $data["name"]);

        }

        else
            $res->success = "Erro ao salvar!";

        return $res;

    }

}
