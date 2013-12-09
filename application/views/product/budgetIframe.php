<h3><?=lang("pdt_Budget")?> <a class="no-print reload btn btn-info"><i class="icon-refresh"></i></a></h3>

<?=$shareButtons?>
<div class="no-print pull-right"><a href="<?=base_url().lang("rt_currency")?>"><?=lang("tmpt_todayRates")?></a></div>

<table class="table table-bordered table-hover table-striped table-condensed">
  <thead>
    <tr>
      <th><?=lang("pdt_code")?></th>
      <th><?=lang("pdt_name")?></th>
      <th><?=lang("pdt_amount")?></th>
      <th><?=lang("pdt_price")?></th>
      <th><?=lang("pdt_total")?></th>
      <th><a class="changeCurrency" rel="tooltip" title="<?=lang("tmpt_select_currency")?>"><span class="currencyCode"></span> <i class="icon-caret-down"></i></a></th>
    </tr>
  </thead>
  <tbody class="list">
    <tr class="item hide">
      <td class="code span2"></td>
      <td><a class="productName" href="<?=base_url()?>product/viewIframe/" target="_blank"></a></td>
      <td class="amount span2"><input class="amount span2" type="number" /></td>
      <td class="span3"><span class="productCurrency"></span> <span class="price"></span></td>
      <td class="span3"><span class="productCurrency"></span> <span class="total"></span></td>
      <td class="span3"><span class="currencyCode"></span> <span class="totalValueConverted"></span></td>
    </tr>
    <tr>
      <td colspan="4"><small>* <?=lang("org_validFrom")?> <?=$genertionTime?> <?=lang("org_until")?> <?=$timelife?><small></td>
      <td><strong><?=lang("pdt_totalValue")?></string></td>
      <td><span class="currencyCode"></span> <span class="totalPrice">0</span></td>
    </tr>
  </tbody>
</table>


<div class="no-print row-fluid">
  <div class="span24">
    <div class="pull-right">
      <span><a class="btn" href="<?=base_url()?><?=lang("rt_vitrine")?>"><?=lang("pdt_addProduct")?></a></span>
      <?php if( ! $this->session->userdata("myOrg") ){ ?><span><a class="openKnowMoreBudget btn btn-success"><?=lang("pdt_knowMore")?></a></span><?php } ?>
      <span><a class="openShareBudget btn btn-primary"><?=lang("pdt_shareProductByMail")?></a></span>
      <span><a class="empty btn btn-danger"><?=lang("pdt_emptyBudget")?></a></span>
    </div>
  </div>
</div>

<div class="hide" id="pdt_wantToEmpty"><?=lang("pdt_wantToEmptyBudget")?></div>
<div id="pdt_TheProduct" class="hide"><?=lang("pdt_TheProduct")?></div>
<div id="pdt_wasNotFound" class="hide"><?=lang("pdt_wasNotFound")?></div>

<hr><?=$paymentResumeHTML?>