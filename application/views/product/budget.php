<h3><?=lang("pdt_Budget")?> <a class="empty btn btn-danger"><i class="icon-remove"></i> <?=lang("pdt_empty")?></a> <a class="reload btn btn-info"><i class="icon-refresh"></i> <?=lang("pdt_refresh")?></a></h3>

<div class="row-fluid list">
  <div class="item span24 hide well well-mini">
    <div class="span2"><img></img></div>
    <div class="span6">
      <small>
        <p><a target="_blank"></a></p>
        <p><?=lang("pdt_code")?>: <span class="code"></span></p>
      </small>
    </div>
    <div class="span4"><small><?=lang("pdt_price")?>: <span class="productCurrency"></span> <span class="price"></span></small></div>
    <div class="span2"><small><input class="amount input-block-level" type="number" /></small></div>
    <div class="span4"><small><?=lang("pdt_total")?>: <span class="productCurrency"></span> <span class="total"></span></small></div>
    <div class="span4"><small><span class="currencyCode"></span> <span class="totalValueConverted"></span></small></div>
  </div>
</div>

<div class="pull-right">

  <dl class="dl-horizontal">
    <dt><?=lang("pdt_totalValue")?></dt><dd><span class="currencyCode"></span> <span class="totalPrice">0</span></dd>
  </dl>

  <div class="pull-right"><a href="<?=base_url()?>currency"><?=lang("tmpt_todayRates")?></a></div>

</div>