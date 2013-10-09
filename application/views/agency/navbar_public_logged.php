<div class="container-fluid">
  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="brand" href="<?=myOrg_url()?>" style="background: url(<?=$this->session->userdata("orgImg")?>) no-repeat left center; background-size: 100%; height:20px; width: 20px; margin:0px 5px;"></a>
  <span class="brand">
    <a href="<?=myOrg_url()?>" rel="tooltip" title="Home"><?=$this->session->userdata("orgName")?></a>
  </span>
  <div class="nav-collapse collapse">
    <ul class="nav">
      <li><a class="blogLink" href="/blog" rel="tooltip" title="Blog"><i class="icon-coffee icon-large"></i> Blog</a></li>
      <li><a href="<?=myOrg_url()?><?=lang('rt_vitrine')?>" rel="tooltip" title="<?=lang('tmpt_VitrineTitle')?>"><i class="icon-windows"></i> <?=lang('tmpt_Vitrine')?></a></li>
      <li><a href="<?=myOrg_url()?><?=lang('rt_budget')?>" target="_blank"><i class="icon-flag"></i> <?=lang('tmpt_Budget')?> <span class="label label-warning budgetTotal"></span></a></li>
    </ul>
    <ul class="nav pull-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" rel="tooltip" title="<?=lang('tmpt_select_lang')?>"><span class="language"><?=$this->session->userdata('language')?></span> <i class="icon-caret-down"></i></a>
        <ul class="dropdown-menu">
          <li><a id="pt" rel="tooltip" title="Traduzir para Português">pt - Português</a></li>
          <li><a id="en" rel="tooltip" title="Translate to English">en - English</a></li>
        </ul>
      </li>
      <li><a class="changeCurrency" rel="tooltip" title="<?=lang("tmpt_select_currency")?>"><span class="currencyCode"></span> <i class="icon-caret-down"></i></a></li>
      <li>
        <a class="userImg" href="<?=myOrg_url()?>" style="border-radius: 40px; background: url(<?=$this->session->userdata("img")?>) no-repeat left center; background-size: 100%; height:10px; width: 20px; margin-top: 5px;"></a>
      </li>
      <li class="dropdown autoOpen pull-right">
        <a class="dropdown-toggle" data-toggle="dropdown"><span class="loggedMenuName"> <?=$this->session->userdata('name')?></span>  <i class="icon-caret-down"></i></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1"  href="<?=myOrg_url() . lang("rt_profile")?>"><?=lang('tmpt_Profile')?></a></li>
          <li class="divider"></li>
          <li><a tabindex="-1"  href="<?=myOrg_url() . lang('rt_logout')?>"><?=lang('tmpt_Logout')?></a></li>
        </ul>
      </li>
    </ul>
  </div><!--/.nav-collapse -->
</div><!-- container -->