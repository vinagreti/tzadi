<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{page_title}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- bootstrap styles -->
  <link rel="stylesheet" href="<?=base_url()?>assets/third_party/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/third_party/bootstrap/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/third_party/bootstrap/css/font-awesome.min.css">
  <!-- tzadi global styles -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/global.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/third_party/bootstrap/css/bootstrap-responsive.css">

  <noscript>
    <p class='hero-unit'><?=lang("tmpt_need_js")?></p>
  </noscript>
  <!--[if IE 7]>
  <link rel="stylesheet" href="<?=base_url()?>assets/third_party/bootstrap/css/font-awesome-ie7.min.css">
  <![endif]-->
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
  <![endif]-->
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>assets/img/144x144.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>assets/img/114x114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>assets/img/72x72.png">
  <link rel="apple-touch-icon-precomposed" href="<?=base_url()?>assets/img/32x32.png">
  <link rel="shortcut icon" href="<?=base_url()?>assets/img/32x32.png">
</head>
<body>
  <!-- Dialogs -->
  <div class="modal hide" id="tzadiDialogs" tabindex="-1"></div>
  <div class="loading"></div>

  <!-- Navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top autoOpen">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <span class="brand">
          <a href="<?=base_url()?>" rel="tooltip" title="Home">צ tzadi.com</a>
        </span>

        <div class="nav-collapse collapse">
          <ul class="nav pull-right">
            <?php if($this->session->userdata('userID')) { ?>
            <li class="dropdown autoOpen pull-right">
              <a class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-large"></i> <?=$this->session->userdata('userName')?></a>
              <ul class="dropdown-menu">
                <li><a tabindex="-1"  href="#profile"><?=lang('tmpt_Profile')?></a></li>
                <li><a tabindex="-1"  href="#configuracoes"><?=lang('tmpt_Settings')?></a></li>
                <li class="divider"></li>
                <li><a tabindex="-1"  href="<?=base_url()?><?=lang('tmpt_logout')?>"><?=lang('tmpt_Logout')?></a></li>
              </ul>
            </li>
            <?php } else { ?> 
              <p class="navbar-text pull-right">
                <i class="icon-user icon-large"></i>
                <a class="navbar-link" href="<?=base_url()?><?=lang('tmpt_login')?>"> <?=lang('tmpt_Login')?></a>
              </p>
            <?php } ?>
          </ul>
          <ul class="nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" rel="tooltip" title="<?=lang('tmpt_Institutional')?>"><i class="icon-comments icon-large"></i> <?=lang('tmpt_Institutional')?></a>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url()?>">Home</a></li>
                <li><a href="<?=base_url()?><?=lang('tmpt_AboutUsHtml')?>"><?=lang('tmpt_AboutUs')?></a></li>
                <li><a href="<?=base_url()?><?=lang('tmpt_ContactUsHtml')?>"><?=lang('tmpt_ContactUs')?></a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" rel="tooltip" title="<?=lang('tmpt_select_lang')?>"><i class="icon-globe icon-large"></i> <?=lang('tmpt_Language')?></a>
              <ul class="dropdown-menu">
                <li><a id="translate_en" rel="tooltip" title="Translate to English">English</a></li>
                <li><a id="translate_pt-BR" rel="tooltip" title="Traduzir para Português">Português</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div><!-- container -->
    </div><!-- navbar-inner -->
  </div><!-- navbar -->
  
  <div class="container well well-small">
    <div class="row">
      <div class="span12">
        <div class="row tzdContent">
          <div class="span12">
            <div class="globalAlert"></div>
          </div>
          <div class="span12">
            {content}
          </div>
        </div>
      </div>
    </div>
    <hr>
    <footer>
      <p class="pull-right"><?=lang('tmpt_Powered_by')?>: &copy; <a target="_blank" href="<?='http://'.ENVIRONMENT?>">Tzadi.com</a> 2013</p>
    </footer>
  </div><!--/.fluid-container-->

  <!-- Loading the JQuery -->
  <script src="<?=base_url()?>assets/third_party/JQuery/jquery.js"></script>
  <!-- Loading the bootstrap js scripts -->
  <script type="text/javascript" src="<?=base_url()?>assets/third_party/bootstrap/js/bootstrap-transition.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/third_party/bootstrap/js/bootstrap-alert.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/third_party/bootstrap/js/bootstrap-modal.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/third_party/bootstrap/js/bootstrap-dropdown.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/third_party/bootstrap/js/bootstrap-scrollspy.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/third_party/bootstrap/js/bootstrap-tab.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/third_party/bootstrap/js/bootstrap-tooltip.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/third_party/bootstrap/js/bootstrap-popover.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/third_party/bootstrap/js/bootstrap-button.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/third_party/bootstrap/js/bootstrap-collapse.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/third_party/bootstrap/js/bootstrap-carousel.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/third_party/bootstrap/js/bootstrap-typeahead.js"></script>
  <?=form_open("",array("class" => "tzadiToken"))?><?=form_close()?>
  <script type="text/javascript">var base_url = "<?=base_url()?>";</script>
  <!-- Cusom JS -->
  <script src="<?=base_url()?>assets/js/tzadi/tzadi.js"></script>
  <?php if (isset($dynJS)){?><script src="<?=base_url()?>assets/js/{dynJS}.js"></script><?php } ?>
</body>
</html>
