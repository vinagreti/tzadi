<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function authenticate( $email, $password ) {
    $data["email"] = $email;
    $data["password"] = md5($password);

    $user = $this->mongo_db
      ->where($data)
      ->get('user');

    if(isset($user[0]))
    {
        $company = $this->mongo_db
          ->where("_id", (int) $user[0]["company"])
          ->get('company');

        $permission["supplier"] = $this->levelToMethods($user[0]["permission"]["supplier"]);
        $permission["product"] = $this->levelToMethods($user[0]["permission"]["product"]);

        $this->session->set_userdata('permission', $permission);
        $this->session->set_userdata('userID', $user[0]["_id"]);
        $this->session->set_userdata('userName', $user[0]["name"]);
        $this->session->set_userdata('userEmail', $user[0]["email"]);
        $this->session->set_userdata('companyID', $user[0]["company"]);
        $this->session->set_userdata('companyNick', $company[0]["nick"]);
        $this->session->set_userdata('companyName', $company[0]["name"]);

        return true;
    }
    else return lang("usr_userNotFound");
  }

  private function levelToMethods( $num ) {

    $permited = str_split( strrev( decbin( $num ) ) );
    $i = 1;
    $classMethods = array();
    foreach ($permited as $key => $value) {
        if( $value == 1) array_push($classMethods, $i);
        $i = $i+$i;
    }
    return $classMethods;
  }

  function resetDatabase(){
    $this->load->model("mongo_model");
    $this->mongo_db->delete_all("user");
    $this->mongo_db->delete_all("file");
    $this->mongo_db->delete_all("product");
    $this->mongo_db->delete_all("supplier");
    $this->mongo_db->delete_all("company");
    $this->mongo_db->delete_all("session");
    $this->mongo_db->set("id", 0)->update('counter');

    $demo["_id"] = $this->mongo_model->newID();
    $demo["name"] = "Demo Intercambios";
    $demo["nick"] = "demo";
    $demo["about"] = "Esta é uma agencia de demonstração, não existe realmente. Todo o seu conteúdo é fictício. Por se tratar de um conteudo de testes, não há um controle sobre as informações da agencia. Favor não utilizar conteúdo inapropriado nos testes, como palavras, imagens, arquivos...";
    $demo["contact"] = "Texto dinamico na pagina de contato";

    $mango["_id"] = $this->mongo_model->newID();
    $mango["name"] = "Mango Intercambios";
    $mango["nick"] = "mango";
    $mango["about"] = "http://mangointercambios.com.br/mangoshop/cms.php?id_cms=4";
    $mango["contact"] = "http://mangointercambios.com.br/mangoshop/cms.php?id_cms=4";

    $bruno["_id"] = $this->mongo_model->newID();
    $bruno["permission"]["supplier"] = "1023";
    $bruno["permission"]["product"] = "1023";
    $bruno["name"] = "Bruno da Silva João";
    $bruno["email"] = "bruno@tzadi.com";
    $bruno["password"] = md5("bruno");
    $bruno["company"] = $demo["_id"];
    $this->mongo_db->insert('user', $bruno);
    $demo["owner"] = $bruno["_id"];
    $this->mongo_db->insert('company', $demo);

    $lucas["_id"] = $this->mongo_model->newID();
    $lucas["permission"]["supplier"] = "1023";
    $lucas["permission"]["product"] = "1023";
    $lucas["name"] = "Lucas Francisco";
    $lucas["email"] = "lucas@tzadi.com";
    $lucas["password"] = md5("lucas");
    $lucas["company"] = $mango["_id"];
    $this->mongo_db->insert('user', $lucas);

    $poliana["_id"] = $this->mongo_model->newID();
    $poliana["permission"]["supplier"] = "1023";
    $poliana["permission"]["product"] = "1023";
    $poliana["name"] = "Poliana G.";
    $poliana["email"] = "poliana@tzadi.com";
    $poliana["password"] = md5("poliana");
    $poliana["company"] = $mango["_id"];
    $this->mongo_db->insert('user', $poliana);
    $mango["owner"] = $poliana["_id"];
    $this->mongo_db->insert('company', $mango);

    $demoUser["_id"] = $this->mongo_model->newID();
    $demoUser["permission"]["supplier"] = "1023";
    $demoUser["permission"]["product"] = "1023";
    $demoUser["name"] = "Usuario demonstração";
    $demoUser["email"] = "demo@tzadi.com";
    $demoUser["password"] = md5("demo");
    $demoUser["company"] = $demo["_id"];
    $this->mongo_db->insert('user', $demoUser);
  }
}
