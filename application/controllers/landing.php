<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends My_Controller {

  public function __construct() {
    // define os tipos de usuarios que podem acessar a classe Task
    parent::__construct();
    
    $this->lang->load('landing', $this->session->userdata('language'));

  }

  public function index()
  {

    $this->landing();

  }
  
  public function landing()
  {

    if( ! defined('IDENTITY') )
      $data->view = 'tzadi/landing';
    
    else if( $this->session->userdata("myOrg") )
      $data->view = $this->session->userdata("orgKind").'/index_private';

    else
      redirect(base_url().lang("rt_vitrine"));

    $this->lang->load('user', $this->session->userdata('language'));
    $data->dynJS = 'user/signup';
    $data->page_title = lang('idx_title');
    $data->the_head = '<link rel="image_src" href="' . base_url() . 'assets/img/144x144.png"  />';
    $data->the_head .= '<meta property="og:image" content="' . base_url() . 'assets/img/144x144.png" />';
    $data->the_head .= '<meta property="og:url" content="' . base_url() . '" />';
    $data->the_head .= '<meta property="og:title" content="TZADI" />';
    $data->the_head .= '<meta property="og:description" content="'. lang('idx_phrase') .'" />';
    $this->page->load($data);
  }
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */