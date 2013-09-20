<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{page_title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap styles -->
    <link rel="stylesheet" href="<?=base_url()?>assets/third_party/bootstrap/css/theme/green/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/third_party/bootstrap/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/third_party/bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/third_party/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/third_party/bootstrap-wysihtml5-master/src/bootstrap-wysihtml5.css" />

    <!-- tzadi global styles -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/global.css" />

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>assets/img/144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>assets/img/114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>assets/img/72x72.png">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url()?>assets/img/32x32.png">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/32x32.png">

    <meta property="fb:admins" content="1110189261"/> <!-- Lucas Facebook ID -->
    <meta property="fb:admins" content="100000036122524"/> <!-- Bruno Facebook ID -->
    <meta property="fb:app_id" content="532888376778430"/>
    <meta property="og:type" content="website" />
    <meta property="og:video" content="http://www.youtube.com/v/mruP0yf7wvw?version=3&amp;autohide=1&keepEmbedCode=true">
    <meta property="og:video:type" content="application/x-shockwave-flash">
    <meta property="og:video:secure_url" content="https://www.youtube.com/v/mruP0yf7wvw?version=3&amp;autohide=1&keepEmbedCode=true" />

    {the_head}

    <noscript>
      <p class='hero-unit'><?=lang("tmpt_need_js")?></p>
    </noscript>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-42648751-1', 'tzadi.com');
        ga('send', 'pageview');
    </script>

  </head>
  <body>
    <div id="fb-root"></div>

    <div class="navbar navbar-fixed-top autoOpen">
        <div class="navbar-inner">
          {navbar}
        </div>
    </div>

    <!-- Dialogs -->
    <span class="tzdFeedbackOpen"><i class="icon-question icon"></i></span>
    <div class="modal hide" id="tzadiDialogs" tabindex="-1"></div>
    <div class="loading"></div>


    <div class="container-fluid container-height tzdContent">
        <div class="globalAlert"></div>
        {content}
    </div>

    <br>

    <div class="footer">
        <ul>
          <small><li><a href="<?=base_url()?><?=lang('rt_about')?>"><?=lang('tmpt_AboutUs')?></a></li></small>
          <small><li><a href="<?=base_url()?><?=lang('rt_contact')?>"><?=lang('tmpt_ContactUs')?></a></li></small>
        </ul>
        <p class="text-center">
            &copy; <a target="_blank" href="http://<?=ENVIRONMENT?>">Tzadi</a> 2013
            - <small><a href="<?=base_url()?><?=lang('rt_privacyPolicy')?>"><?=lang('tmpt_PrivacyPolicy')?></a></small>
            - <small><a href="<?=base_url()?><?=lang('rt_termsOfUse')?>"><?=lang('tmpt_TermsOfUse')?></a></small>
        </p>
    </div>

    <!-- Loading the JQuery -->
    <script src="<?=base_url()?>assets/third_party/JQuery/jquery.js"></script>
    <script src="<?=base_url()?>assets/third_party/JQuery/jquery.cookie.js"></script>
    <script src="<?=base_url()?>assets/third_party/JQuery/jquery.mask.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?libraries=places&region=uk&language=en&sensor=false"></script>
    <script src="<?=base_url()?>assets/third_party/JQuery/jquery.geocomplete.min.js"></script>

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
    <script type="text/javascript" src="<?=base_url()?>assets/third_party/select2/select2.js"></script>
    <script src="<?=base_url()?>assets/third_party/bootstrap-wysihtml5-master/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="<?=base_url()?>assets/third_party/bootstrap-wysihtml5-master/src/bootstrap-wysihtml5.js"></script>

    <?=form_open("",array("class" => "tzadiToken"))?><?=form_close()?>
    <script type="text/javascript">var base_url = "<?=base_url()?>";</script>
    <script type="text/javascript">var IDENTITY = "<?=$this->session->userdata('profileID')?>";</script>
    <!-- Cusom JS -->
    <script src="<?=base_url()?>assets/js/tzadi/tzadi.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-lang.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-ajax.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-string.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-alert.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-currency.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-counter.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-date.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-budget.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-form.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-onkeyup-fix.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-confirm.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-list.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-loading.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-geocomplete.js"></script>
    <script src="<?=base_url()?>assets/js/tzadi/tzadi-feedback.js"></script>
    <?php if (isset($dynJS) && is_string($dynJS)){?><script src="<?=base_url()?>assets/js/{dynJS}.js"></script><?php } ?>
    <?php if (isset($dynJS) && is_array($dynJS)){ foreach($dynJS as $js) { ?><script src="<?=base_url()?>assets/js/<?=$js?>.js"></script><?php } } ?>

  </body>

</html>