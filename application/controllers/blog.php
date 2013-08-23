<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends My_Controller {

  public function __construct() {

    parent::__construct();

		$this->lang->load('blog', $this->session->userdata('language'));

  }

  public function index(){

    $this->load->model("blog_model");

    $data->post = $this->blog_model->getLast();

    if( $data->post ) {

      if( $this->session->userdata("identity") == $this->session->userdata("profileIdentity") ) {

        $data->dynJS = 'blog/blog';

        $data->view = 'blog/owner_view';

      }

      else {
        
        $data->dynJS = 'blog/blog';

        $data->view = 'blog/public_view';

      }

      $data->page_title = lang('blg_Blog');

      $this->page->load($data);

    } else {

      if( $this->session->userdata("identity") == $this->session->userdata("profileIdentity") )
        $data->view = 'blog/owner_empty';

      else
        $data->view = 'blog/public_empty';

      $data->page_title = lang('blg_Blog');

      $this->page->load($data);

    }

  }

	public function posts()
	{

    $this->load->model("blog_model");

    $data->news = $this->blog_model->news();

    if( $data->news ) {

      $data->dynJS = array('blog/list', 'blog/blog');

      if( $this->session->userdata("identity") == $this->session->userdata("profileIdentity") )
        $data->view = 'blog/owner_list';

      else
        $data->view = 'blog/public_list';

      $data->page_title = lang('blg_Blog');

      $this->page->load($data);

    } else {

      if( $this->session->userdata("identity") == $this->session->userdata("profileIdentity") )
        $data->view = 'blog/owner_empty';

      else
        $data->view = 'blog/public_empty';

      $data->page_title = lang('blg_Blog');

      $this->page->load($data);

    }

  }

  public function write()
  {

    if( $this->session->userdata("identity") == $this->session->userdata("profileIdentity") ) {

      if( $this->input->post() ) {

        $this->load->model("blog_model");

        echo json_encode( $this->blog_model->write( $this->input->post() ) );

      } else {

        $data->dynJS = 'blog/write';

        $data->view = 'blog/write';

        $data->page_title = lang('blg_Blog');

        $this->page->load($data);

      }

    } else {

      redirect("http://".$this->session->userdata("identity").".".ENVIRONMENT."/blog/".lang("rt_write"));

    }

  }

  public function edit( $url )
  {

    if( $this->input->post() ) {

      $this->load->model("blog_model");

      echo json_encode($data->post = $this->blog_model->update( $this->input->post() ));

    } else {

      $this->load->model("blog_model");

      $data->post = $this->blog_model->getByUrl( $url );

      if( $data->post ) {

        $data->dynJS = array('blog/edit', "blog/blog");

        $data->view = 'blog/edit';

        $data->page_title = lang('blg_Blog');

        $this->page->load($data);

      } else {

        if( $this->session->userdata("identity") == $this->session->userdata("profileIdentity") )
          $data->view = 'blog/owner_empty';

        else
          $data->view = 'blog/public_empty';

        $data->page_title = lang('blg_Blog');

        $this->page->load($data);

      }

    }

  }

  public function view( $url )
  {

    $this->load->model("blog_model");

    $data->post = $this->blog_model->getByUrl( $url );

    if( $data->post ) {

      if( $this->session->userdata("identity") == $this->session->userdata("profileIdentity") )
        $data->view = 'blog/owner_view';

      else
        $data->view = 'blog/public_view';

      $data->dynJS = array("blog/blog");

      $data->page_title = lang('blg_Blog');

      $this->page->load($data);

    } else {

      if( $this->session->userdata("identity") == $this->session->userdata("profileIdentity") )
        $data->view = 'blog/owner_empty';

      else
        $data->view = 'blog/public_empty';

      $data->page_title = lang('blg_Blog');

      $this->page->load($data);

    }

  }

  public function drop()
  {

    $this->load->model("blog_model");

    echo json_encode( $this->blog_model->drop( $this->input->post() ) );

  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */