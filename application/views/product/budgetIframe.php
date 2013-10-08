<span class="pull-right">
    <a class="btn btn-small" href="<?=base_url()?>vitrineIframe"><?=lang("tmpt_Products")?></a>
    <a class="btn btn-small" href="<?=base_url()?>budgetIframe"><i class="icon-flag"></i> <?=lang('tmpt_Budget')?> <span class="label label-warning budgetTotal"></span></a>
    <a class="changeCurrency btn btn-small" rel="tooltip" title="<?=lang("tmpt_select_currency")?>"><span class="currencyCode"></span> <i class="icon-caret-down"></i></a>
    <a class="btn btn-small" href="<?=base_url()?>currencyIframe"><?=lang("tmpt_todayRates")?></a>
</span>

<h3><?=lang("pdt_Budget")?> <a class="reload btn btn-info"><i class="icon-refresh"></i></a></h3>

<div class="row-fluid">
  <div class="span24 list">
    <div class="row-fluid item hide">
      <div class="span24  tzdTableRow">
        <div class="span2 text-center"><a class="productImg" target="_blank"><img class="imgSmall"></img></a></div>
        <div class="span6">
          <small>
            <p><a class="productName" target="_blank"></a></p>
            <p><?=lang("pdt_code")?>: <span class="code"></span></p>
          </small>
        </div>
        <div class="span4"><small><?=lang("pdt_price")?>: <span class="productCurrency"></span> <span class="price"></span></small></div>
        <div class="span2"><small><input class="amount input-block-level" type="number" /></small></div>
        <div class="span4"><small><?=lang("pdt_total")?>: <span class="productCurrency"></span> <span class="total"></span></small></div>
        <div class="span4"><small><span class="currencyCode"></span> <span class="totalValueConverted"></span></small></div>
      </div>
    </div>
  </div>
</div>

<div class="pull-right">

  <dl class="dl-horizontal">
    <dt><?=lang("pdt_totalValue")?></dt><dd><span class="currencyCode"></span> <span class="totalPrice">0</span></dd>
  </dl>
  <span><a class="btn" href="<?=base_url()?>vitrineIframe"><?=lang("pdt_addProduct")?> <i class="icon-plus"></i></a></span>
  <span><a class="openKnowMoreBudget btn btn-success"><?=lang("pdt_knowMore")?></a></span>
  <span><a class="openShareBudget btn btn-primary"><?=lang("pdt_shareProductByMail")?></a></span>
  <span><a class="empty btn btn-danger"><?=lang("pdt_emptyBudget")?></a></span>

</div>

<div class="hide" id="pdt_wantToEmpty"><?=lang("pdt_wantToEmptyBudget")?></div>

<div id="pdt_TheProduct" class="hide"><?=lang("pdt_TheProduct")?></div>
<div id="pdt_wasNotFound" class="hide"><?=lang("pdt_wasNotFound")?></div>