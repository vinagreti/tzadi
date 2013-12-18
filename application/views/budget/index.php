<h3><?=lang("bdg_Title")?> <a class="no-print reload btn btn-info"><i class="icon-refresh"></i></a></h3>

<div class="no-print"><?=$shareButtons?></div>

<div class="no-print pull-right"><a href="<?=base_url().lang("rt_currency")?>"><?=lang("tmpt_todayRates")?></a></div>

<table class="table table-bordered table-hover table-striped table-condensed">
  <thead>
    <tr>
      <th><?=lang("bdg_code")?></th>
      <th><?=lang("bdg_name")?></th>
      <th><?=lang("bdg_amount")?></th>
      <th><?=lang("bdg_price")?></th>
      <th><?=lang("bdg_total")?></th>
      <th><a class="changeCurrency" rel="tooltip" title="<?=lang("tmpt_select_currency")?>"><span class="currencyCode"></span> <i class="icon-caret-down"></i></a></th>
      <th class="no-print"></th>
    </tr>
  </thead>
  <tbody class="list">
    <tr class="item hide">
      <td class="code span2"></td>
      <td><a class="productName" href="<?=base_url()?>product/" target="_blank"></a></td>
      <td class="span3 "><div class="text-center"><a class="amountMinus btn btn-mini pull-left no-print"><i class="icon-minus"></i></a> <span class="amount">1</span> <a class="amountPlus btn btn-mini pull-right no-print"><i class="icon-plus"></i></a></div></td>
      <td class="span4"><span class="productCurrency"></span> <span class="price"></span></td>
      <td class="span4"><span class="productCurrency"></span> <span class="total"></span></td>
      <td class="span4"><span class="currencyCode"></span> <span class="totalValueConverted"></span></td>
      <td class="span1 no-print"><a class="removeItem btn btn-danger btn-mini pull-right no-print"><i class="icon-remove"></i></a></td>
    </tr>
    <tr>
      <td class="info" colspan="4"><small>* <?=lang("bdg_validFrom")?> <?=$genertionTime?> <?=lang("bdg_until")?> <?=$timelife?><small></td>
      <td><strong><?=lang("bdg_totalValue")?></string></td>
      <td colspan="2"><span class="currencyCode"></span> <span class="totalPrice">0</span></td>
    </tr>
  </tbody>
</table>

<div class="no-print row-fluid">
  <div class="span24">
    <div class="pull-right">
      <span><a class="btn btn-warning" href="<?=base_url()?><?=lang("rt_vitrine")?>"><?=lang("bdg_addProduct")?></a></span>
      <?php if( ! $this->session->userdata("myOrg") ){ ?><span><a class="openKnowMoreBudget btn btn-success"><?=lang("bdg_knowMore")?></a></span><?php } ?>
      <span><a class="openShareBudget btn btn-primary"><?=lang("bdg_shareProductByMail")?></a></span>
      <span><a class="empty btn btn-danger"><?=lang("bdg_emptyBudget")?></a></span>
      <span><a class="printBudget btn"><?=lang("bdg_printBudget")?></a></span>
    </div>
  </div>
</div>

<div class="hide" id="bdg_wantToEmpty"><?=lang("bdg_wantToEmptyBudget")?></div>
<div id="bdg_TheProduct" class="hide"><?=lang("bdg_TheProduct")?></div>
<div id="bdg_wasNotFound" class="hide"><?=lang("bdg_wasNotFound")?></div>

<hr><?=$paymentResumeHTML?>