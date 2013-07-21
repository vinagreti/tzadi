<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{page_title}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- bootstrap styles -->
  <link rel="stylesheet" href="<?=base_url()?>assets/third_party/bootstrap/css/theme/orange/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/third_party/bootstrap/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/third_party/bootstrap/css/font-awesome.min.css">
  <!-- tzadi global styles -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/global.css">

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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42381472-1', 'tzadi.com');
  ga('send', 'pageview');

</script>

</head>
<body>
  <!-- Dialogs -->
  <div class="modal hide" id="tzadiDialogs" tabindex="-1"></div>
  <div class="loading"></div>

  <!-- Navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top autoOpen">
    <div class="navbar-inner">

      <div class="globalAlert"></div>
      
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <span class="brand">
          <a href="<?=base_url()?>" rel="tooltip" title="Home">צ TZADI</a>
        </span>

        <div class="nav-collapse collapse">
          <ul class="nav pull-right">

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" rel="tooltip" title="<?=lang('tmpt_select_lang')?>"><span class="language"><?=$this->session->userdata('app_language')?></span> <i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li><a id="en" rel="tooltip" title="Translate to English">en -English</a></li>
                <li><a id="pt" rel="tooltip" title="Traduzir para Português">pt - Português</a></li>
              </ul>
            </li>

            <?php if($this->session->userdata('userID')) { ?>
            <li class="dropdown autoOpen pull-right">
              <a class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-large"></i> <?=$this->session->userdata('userName')?></a>
              <ul class="dropdown-menu">
                <li><a tabindex="-1"  href="#profile"><?=lang('tmpt_Profile')?></a></li>
                <li><a tabindex="-1"  href="#configuracoes"><?=lang('tmpt_Settings')?></a></li>
                <li class="divider"></li>
                <li><a tabindex="-1"  href="<?=base_url()?><?=lang('rt_logout')?>"><?=lang('tmpt_Logout')?></a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li>
              <button class="btn btn-success" style="color:white;" id="signUp" onclick="location.href='<?=base_url()?><?=lang('rt_signup')?>'"><i class="icon-arrow-right"></i> <?=lang('tmpt_signup')?></button>
            </li>
            <li class="divider-vertical"></li>
            <li>
              <button class="btn btn-info" style="color:white;" onclick="location.href='<?=base_url()?><?=lang('rt_login')?>'"><i class="icon-user icon-large"></i> <?=lang('tmpt_login')?></button>
            </li>
          <?php } ?>
        </ul>

        </div><!--/.nav-collapse -->
      </div><!-- container -->
    </div><!-- navbar-inner -->
  </div><!-- navbar -->
  
  <div class="container">
    <div class="row">
      <div class="span24">
        <div class="row tzdContent">
          <div class="span24">

            {content}

          </div>
        </div>

        <hr>
        
        <div class="row">
          <div class="span24 footer">
            <div class="row">
              <div class="span20 offset2">
                <h6>&nbsp; A Tzadi</h6>
                <ul>
                  <small><li><a href="<?=base_url()?><?=lang('rt_about')?>"><?=lang('tmpt_AboutUs')?></a></li></small>
                  <small><li><a href="<?=base_url()?><?=lang('rt_contact')?>"><?=lang('tmpt_ContactUs')?></a></li></small>
                  <small><li><a href="<?=base_url()?><?=lang('rt_privacyPolicy')?>"><?=lang('tmpt_PrivacyPolicy')?></a></li></small>
                  <small><li><a href="<?=base_url()?><?=lang('rt_termsOfUse')?>"><?=lang('tmpt_TermsOfUse')?></a></li></small>
                </ul>
              </div>
            </div>
            <footer>
              <p class="text-center">&copy; <a target="_blank" href="http://<?=ENVIRONMENT?>">Tzadi</a> 2013</p>
            </footer>
          </div>
        </div>
      </div>
    </div>

  </div><!--/.fluid-container-->

  <!-- Loading the JQuery -->
  <script src="<?=base_url()?>assets/third_party/JQuery/jquery.js"></script>
  <script src="<?=base_url()?>assets/third_party/JQuery/jquery.mask.min.js"></script>
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
  <script src="<?=base_url()?>assets/js/tzadi/tzadi-lang.js"></script>
  <script src="<?=base_url()?>assets/js/tzadi/tzadi-ajax.js"></script>
  <script src="<?=base_url()?>assets/js/tzadi/tzadi-string.js"></script>
  <script src="<?=base_url()?>assets/js/tzadi/tzadi-alert.js"></script>
  <script src="<?=base_url()?>assets/js/tzadi/tzadi-counter.js"></script>
  <script src="<?=base_url()?>assets/js/tzadi/tzadi-form.js"></script>
  <script src="<?=base_url()?>assets/js/tzadi/tzadi-onkeyup-fix.js"></script>
  <script src="<?=base_url()?>assets/js/tzadi/tzadi-confirm.js"></script>
  <script src="<?=base_url()?>assets/js/tzadi/tzadi-list.js"></script>
  <script src="<?=base_url()?>assets/js/tzadi/tzadi-loading.js"></script>
  <?php if (isset($dynJS) && is_string($dynJS)){?><script src="<?=base_url()?>assets/js/{dynJS}.js"></script><?php } ?>
  <?php if (isset($dynJS) && is_array($dynJS)){ foreach($dynJS as $js) { ?><script src="<?=base_url()?>assets/js/<?=$js?>.js"></script><?php } } ?>
</body>
</html>
