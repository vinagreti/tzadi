<p><?=$questions?></p>

<div class="row-fluid">
  <div class="span24 well well-mini">
    <div class="row-fluid">
      <div class="span24">
        <?php foreach( $budget->itens as $iten ) { ?>
            <p><?=$iten["budgetAmount"]?>x <a href="<?=base_url().$iten["_id"]?>"><?=$iten["name"]?></a>&nbsp;&nbsp;&nbsp; <span class="pull-right"><?=$iten["humanPrice"]?></span></p>
        <?php } ?>
        <p class="pull-right"><strong class="text-warning"><?=lang("pdt_total")?>:</strong> <?=$budget->price?></p>
      </div>
    </div>
  </div>
</div>