<div class="g-plus" data-action="share" data-annotation="bubble"></div>
<div class="fb-like" data-href="http://facebook.com/tzadiinc" data-width="450" data-layout="button_count" data-show-faces="true" data-send="true"></div>

<div class="row-fluid">
  <div class="span24 home-phrase-bg">
    <div class="row-fluid">
      <div class="span20 offset2 centered-text">
        <h1><?=lang('idx_phrase')?></h1>
        <br></br>
        <p class="lead"><?=lang('idx_explanation')?></p>
        <br></br>
        <a class="btn btn-large btn-success" href="<?=base_url()?><?=lang('rt_signup')?>"><?=lang('tmpt_signup')?></a>
        <a class="btn btn-large btn-info" href="<?=base_url()?><?=lang('rt_login')?>"><?=lang('tmpt_login')?></a>
      </div>
    </div>
  </div>
</div>

<div class="row-fluid" id="school">
  <div class="span24 home-school-bg">
    <div class="row-fluid">
      <div class="span17 offset1 centered-text">
        <h2><?=lang('idx_School')?></h2>
        <h5><?=lang('idx_explainSchool')?></h5>
        <p><?=lang('idx_School_txt1')?></br><?=lang('idx_School_txt2')?></br><?=lang('idx_School_txt3')?></p>
        <a class="btn btn-large btn-success" href="<?=base_url()?><?=lang('rt_signup')?>"><?=lang('tmpt_signup')?></a>
      </div>
      <div class="span6">
        <img src="<?=base_url()?>assets/img/globe.png?v=2" style="width:100%; height:100%;"></im>
      </div>
    </div>
  </div>
</div>

<div class="row-fluid" id="agency">
  <div class="span24 home-agency-bg">
    <div class="row-fluid">
      <div class="span6">
        <img src="<?=base_url()?>assets/img/globe.png?v=2" style="width:100%; height:100%;"></im>
      </div>
      <div class="span17 centered-text">
        <h2><?=lang('idx_Agency')?></h2>
        <h5><?=lang('idx_explainAgency')?></h5>
        <p><?=lang('idx_Agency_txt1')?></br><?=lang('idx_Agency_txt2')?></br><?=lang('idx_Agency_txt3')?></p>
        <a class="btn btn-large btn-success" href="<?=base_url()?><?=lang('rt_signup')?>"><?=lang('tmpt_signup')?></a>
      </div>
    </div>
  </div>
</div>

<div class="row-fluid" id="student">
  <div class="span24 home-student-bg">
    <div class="row-fluid">
      <div class="span17 offset1 centered-text">
        <h2><?=lang('idx_Student')?></h2>
        <h5><?=lang('idx_explainStudent')?></h5>
        <p><?=lang('idx_Student_txt1')?></br><?=lang('idx_Student_txt2')?></p>
        <a class="btn btn-large btn-success" href="<?=base_url()?><?=lang('rt_signup')?>"><?=lang('tmpt_signup')?></a>
      </div>
      <div class="span6">
        <img src="<?=base_url()?>assets/img/globe.png?v=2" style="width:100%; height:100%;"></im>
      </div>
    </div>
  </div>
</div>
<br>
<div class="g-plus" data-action="share" data-annotation="bubble"></div>
<div class="fb-like" data-href="http://facebook.com/tzadiinc" data-width="450" data-layout="button_count" data-show-faces="true" data-send="true"></div>


<script type="text/javascript">
  // isso deve ser carregado no js de cada pagina. como o index nao tem js dedicado, colocamos aqui manualmente.
  // Load the FACEBOOK SDK asynchronously - like
  (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=532888376778430";
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
      
  // Load the GOOGLE plusone asynchronously
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>