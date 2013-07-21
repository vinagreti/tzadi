<h2><?=lang("pdt_Budget")?> <a class="empty btn btn-danger"><i class="icon-remove"></i> <?=lang("pdt_empty")?></a> <a class="reload btn btn-info"><i class="icon-refresh"></i> <?=lang("pdt_refresh")?></a></h2>

<div class="list row">
  <div class="item span24 hide">
    <div class="row">
      <div class="span2"><input class="amount input-block-level" type="number" /></div>
      <div class="span12"><a target="_blank"></a></div>
      <div class="span4"><?=lang("pdt_price")?>: <span class="productCurrency"></span> <span class="price"></span></div>
      <div class="span4"><?=lang("pdt_total")?>: <span class="productCurrency"></span> <span class="total"></span></div>
    </div>
  </div>
</div>

<div class="pull-right">

  <dl class="dl-horizontal">
    <dt><?=lang("pdt_totalValue")?></dt><dd><span class="productCurrency"></span> <span class="totalPrice">0</span></dd>
    <dt><?=lang("pdt_totalValueConverted")?></dt><dd><span class="totalPriceConverted">0</span></dd>
  </dl>

  <div class="pull-right"><a href="<?=base_url()?>currency"><?=lang("tmpt_todayRates")?></a></div>

</div>