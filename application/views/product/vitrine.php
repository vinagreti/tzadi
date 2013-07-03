<h3><?=lang('pdt_listTitle')?></h3>

<div class="row">
  <div class="span12">
    <span class="input-append">
      <input type="text" class="search" placeholder="<?=lang('pdt_searchSample')?>"  rel="tooltip" title="<?=lang('pdt_searchExplain')?>">
      <a class="btn clearSearch" rel="tooltip" title="<?=lang('pdt_removeClearSearchQuery')?>"><i class="icon-remove"></i></a>
    </span>
  </div>
</div>

<p>
  <div class="row">
    <div class="span12">
      <ul class="nav nav-pills">
        <li class="filterKind active" id="all"><a><?=lang('pdt_all')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="accommodation"><a><?=lang('pdt_accommodation')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="course"><a><?=lang('pdt_course')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="pass"><a><?=lang('pdt_pass')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="ensurance"><a><?=lang('pdt_ensurance')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="tourism"><a><?=lang('pdt_tourism')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="transfer"><a><?=lang('pdt_transfer')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="work"><a><?=lang('pdt_work')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="regularProduct"><a><?=lang('pdt_others')?> (<span class="found">0</span>)</a></li>
      </ul>  
    </div>
  </div>
</p>

<div class="row">
  <div class="span12 itensList">
    <div class="row line">
      <div class="span2 product hide">
        <div class="thumbnail well well-mini">
          <a class="open" href="#" target="_blank">
            <img class="img" alt="160x120" style="width: 100%; height: 160px;" src="<?=base_url()?>assets/img/no_photo_160x120.png">
            <h5><span class="name"></span></h5>
            <p><?=lang('pdt_price')?>: <span class="price"></span></p>
          </a>
          <a class="addToBudget btn btn-warning" rel="tooltip" title="<?=lang('pdt_addToBudget')?>"><i class="icon-flag"></i></a>
          <a href="#" class="shareProductByMail btn btn-primary" rel="tooltip" title="<?=lang('pdt_shareProductByMail')?>"><i class="icon-group"></i></a>
          <div class="pull-right">
            <a class="like btn" rel="tooltip" title="<?=lang('pdt_like')?>"><i class="icon-thumbs-up-alt"></i> <span class="likes"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>