<div class="row">
  <div class="span24 footer">
    <div class="row">
      <div class="span20 offset2">
        <h6>&nbsp; <?=$this->session->userdata("agencyName")?></h6>
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