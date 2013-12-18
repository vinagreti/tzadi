<h3><?=lang("bdg_Title")?></h3>

<table class="table table-bordered table-hover table-striped table-condensed">
  <thead>
    <tr>
      <th><?=lang("bdg_code")?></th>
      <th><?=lang("bdg_name")?></th>
      <th><?=lang("bdg_amount")?></th>
      <th><?=lang("bdg_price")?></th>
      <th><?=lang("bdg_total")?></th>
      <th><a class="changeCurrency" rel="tooltip" title="<?=lang("tmpt_select_currency")?>"><span class="currencyCode"></span> <i class="icon-caret-down"></i></a></th>
    </tr>
  </thead>

  <tbody class="list">
    <tr class="item hide">
      <td class="code span2"></td>
      <td><a class="productName" href="<?=base_url()?>product/" target="_blank"></a></td>
      <td class="span3 "><div class="text-center"><span class="amount">1</span></div></td>
      <td class="span4"><span class="productCurrency"></span> <span class="price"></span></td>
      <td class="span4"><span class="productCurrency"></span> <span class="total"></span></td>
      <td class="span4"><span class="currencyCode"></span> <span class="totalValueConverted"></span></td>
    </tr>
    <tr>
      <td class="info" colspan="4"><small>* <?=lang("bdg_validFrom")?> <?=$genertionTime?> <?=lang("bdg_until")?> <?=$timelife?><small></td>
      <td><strong><?=lang("bdg_totalValue")?></string></td>
      <td colspan="2"><span class="currencyCode"></span> <span class="totalPrice">0</span></td>
    </tr>
  </tbody>

</table>

<hr><?=$paymentResumeHTML?>