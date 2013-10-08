<span class="pull-right">
    <a class="btn btn-small" href="<?=base_url()?>vitrineIframe"><?=lang("tmpt_Products")?></a>
    <a class="btn btn-small" href="<?=base_url()?>budgetIframe"><i class="icon-flag"></i> <?=lang('tmpt_Budget')?> <span class="label label-warning budgetTotal"></span></a>
    <a class="changeCurrency btn btn-small" rel="tooltip" title="<?=lang("tmpt_select_currency")?>"><span class="currencyCode"></span> <i class="icon-caret-down"></i></a>
    <a class="btn btn-small" href="<?=base_url()?>currencyIframe"><?=lang("tmpt_todayRates")?></a>
</span>

<h3><?=lang('pdt_listTitle')?></h3>

<div class="row-fluid">
  <div class="span24">
    <span class="input-append">
      <input type="text" class="search" placeholder="<?=lang('pdt_searchSample')?>"  rel="tooltip" title="<?=lang('pdt_searchExplain')?>">
      <a class="btn clearSearch" rel="tooltip" title="<?=lang('pdt_removeClearSearchQuery')?>"><i class="icon-remove"></i></a>
    </span>
  </div>
</div>

<p>
  <div class="row-fluid">
    <div class="span24">
      <ul class="nav nav-pills">
        <li class="filterKind active" id="all"><a><?=lang('pdt_all')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="accommodation"><a><?=lang('pdt_accommodation')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="course"><a><?=lang('pdt_course')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="package"><a><?=lang('pdt_package')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="pass"><a><?=lang('pdt_pass')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="ensurance"><a><?=lang('pdt_ensurance')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="tourism"><a><?=lang('pdt_tourism')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="transfer"><a><?=lang('pdt_transfer')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="work"><a><?=lang('pdt_work')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="service"><a><?=lang('pdt_service')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="regularProduct"><a><?=lang('pdt_others')?> (<span class="found">0</span>)</a></li>
      </ul>  
    </div>
  </div>
</p>

<div class="row-fluid">
  <div class="span24 itensList">
    <div class="row-fluid line">
      <div class="span6 product hide item-vitrine">
        <a class="open" href="<?=base_url()?>product/viewIframe/">
          <p class="text-center"><img class="img imgMedium" alt="160x120" src="<?=base_url()?>assets/img/no_photo_160x120.png"><p>
        </a>
        <div class="">
          <h5><span class="name"></span></h5>
          <p><?=lang('pdt_price')?>: <span class="price"></span></p>
          <a class="addToBudget btn btn-warning btn-block" rel="tooltip" title="<?=lang('pdt_addToBudget')?>"><?=lang('pdt_addToBudget')?></a>
        </div>
      </div>
    </div>
  </div>
</div>