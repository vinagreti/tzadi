<div class="row">
  <div class="span24" style="background:#59B259; margin-top:20px; padding:100px 0px; border-radius: 10px; background-position: center top; background-size: 100% auto; background-image:url(<?=base_url()?>assets/img/home-participants-bg.jpg);">
    <div class="row">

      <div class="span20 offset2 centered-text">
        <h1><?=lang('idx_phrase')?></h1>
        <br></br>
        <p class="lead"><?=lang('idx_explanation')?></p>
        <br></br>
        <div class="row">
          <div class="span10 centered-text">
            <p><?=lang('idx_areYouAn')?> <a id="goToAgency"><?=lang('idx_Agency')?></a>?</p>
            <a class="btn btn-large btn-success" href="<?=base_url()?>signup"><?=lang('idx_agencySignup')?></a>
          </div>
          <div class="span10 centered-text">
            <p><?=lang('idx_areYouAn')?> <a id="goToStudent"><?=lang('idx_Student')?></a> <?=lang('idx_orAn')?> <a id="goToInstitution"><?=lang('idx_School')?></a>?</p>
            <a class="btn btn-large btn-warning beInTouch" href="#beInTouch"><?=lang('idx_beInTouch')?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row" id="institution">
  <div class="span24" style="background:white; margin-top:20px; padding:80px 0px; border-radius: 10px; border: 1px solid orange">
    <div class="row">
      <div class="span17 offset1 centered-text">
        <h2><?=lang('idx_School')?></h2>
        <h5><?=lang('idx_explainSchool')?></h5>
        <p><?=lang('idx_School_txt1')?></br><?=lang('idx_School_txt2')?></br><?=lang('idx_School_txt3')?></p>
        <a class="btn btn-large btn-warning beInTouch" href="#beInTouch"><?=lang('idx_beInTouch')?></a>
      </div>
      <div class="span6">
        <img src="<?=base_url()?>assets/img/favicon.ico?v=2"></im>
      </div>
    </div>
  </div>
</div>

<div class="row" id="agency">
  <div class="span24" style="background:white; margin-top:20px; padding:80px 0px; border-radius: 10px; border: 1px solid orange">
    <div class="row">
      <div class="span6">
        <img src="<?=base_url()?>assets/img/favicon.ico?v=2"></im>
      </div>
      <div class="span17 centered-text">
        <h2><?=lang('idx_Agency')?></h2>
        <h5><?=lang('idx_explainAgency')?></h5>
        <p><?=lang('idx_Agency_txt1')?></br><?=lang('idx_Agency_txt2')?></br><?=lang('idx_Agency_txt3')?></p>
        <a class="btn btn-large btn-success" href="<?=base_url()?>signup"><?=lang('idx_agencySignup')?></a>
      </div>
    </div>
  </div>
</div>

<div class="row" id="student">
  <div class="span24" style="background:white; margin-top:20px; padding:80px 0px; border-radius: 10px; border: 1px solid orange">
    <div class="row">
      <div class="span17 offset1 centered-text">
        <h2><?=lang('idx_Student')?></h2>
        <h5><?=lang('idx_explainStudent')?></h5>
        <p><?=lang('idx_Student_txt1')?></br><?=lang('idx_Student_txt2')?></p>
        <a class="btn btn-large btn-warning beInTouch" href="#beInTouch"><?=lang('idx_beInTouch')?></a>
      </div>
      <div class="span6">
        <img src="<?=base_url()?>assets/img/favicon.ico?v=2"></im>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="span24 centered-text" style="background:black; margin-top:20px; padding:20px 0px; border-radius: 10px; heigth:100%;">
    <a href="<?=base_url()?><?=lang('rt_privacyPolicy')?>"><?=lang('tmpt_PrivacyPolicy')?></a>
    -
    <a href="<?=base_url()?><?=lang('rt_termsOfUse')?>"><?=lang('tmpt_TermsOfUse')?></a>
  </div>
</div>


