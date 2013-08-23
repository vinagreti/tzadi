

<div class="row-fluid">
  <div class="span7 well">
    <div class="row-fluid">
    <div class="g-plus" data-action="share" data-annotation="bubble"></div>
    <div class="fb-like" data-href="<?=base_url().uri_string()?>" data-width="450" data-layout="button_count" data-show-faces="true" data-send="true"></div>
      
      <div class="span24">
        <div id="myCarousel" class="carousel slide">
          <div class="carousel-inner">
            <?php if(isset($product["img"])) {
              foreach($product["img"] as $key => $img){
                if($key == 0) { ?> <div class="active item"><a href="<?=base_url()?>file/open/<?=$img?>"><img class="img" alt="160x120" src="<?=base_url()?>file/open/<?=$img?>" style="width:100%;"></a></div>
                <?php } else { ?><div class="item"><a href="<?=base_url()?>file/open/<?=$img?>"><img class="img" alt="160x120" src="<?=base_url()?>file/open/<?=$img?>" style="width:100%;"></a></div> <?php }
              }
            } else { ?>
              <div class="active item"><img class="img" alt="160x120" src="<?=base_url()?>assets/img/no_photo_640x480.png"></div>
            <?php }?>
          </div>
          <!-- Carousel nav -->
          <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
      </div>
      <div class="span24">
        <a class="addToBudget btn btn-block btn-warning" id="<?=$product["_id"]?>" rel="tooltip" title="<?=lang('pdt_addToBudget')?>"><i class="icon-flag"></i> <?=lang('pdt_addToBudget')?></a>
        <a class="shareProductByMail btn btn-block btn-primary" href="#" id="<?=$product["_id"]?>" rel="tooltip" title="<?=lang('pdt_shareProductByMail')?>"><i class="icon-group"></i> <?=lang('pdt_shareProductByMail')?></a>
      </div>
    </div>
  </div>

  <div class="span14 well">
    <div class="pull-right"><a href="<?=base_url()?>currency"><?=lang("tmpt_todayRates")?></a></div>

    <dl class="dl-horizontal">
      <dt><?=lang("pdt_name")?></dt><dd><?=$product["name"]?></dd>
      <dt><?=lang("pdt_code")?></dt><dd><?=$product["_id"]?></dd>
      <?php if(isset($product["price"])) {
        echo "<dt>" . lang("pdt_price") . "</dt><dd><span class='productCurrency'>". $product["currency"]."</span> <span class='price'>" . $product["price"] . "</span></dd>"; 
        echo "<dt>" . lang("pdt_priceConverted") . "</dt><dd class='priceConverted'></dd>";
      }?>
      <?php if(isset($product["courseDuration"])) echo "<dt>" . lang("pdt_courseDuration") . "</dt><dd>" . $product["courseDuration"] . "</dd>"; ?>
      <?php if(isset($product["courseKind"])) echo "<dt>" . lang("pdt_courseKind") . "</dt><dd>" . $product["courseKind"] . "</dd>"; ?>
      <?php if(isset($product["coursePeriod"])) echo "<dt>" . lang("pdt_period") . "</dt><dd>" . $product["coursePeriod"] . "</dd>"; ?>
      <?php if(isset($product["courseModality"])) echo "<dt>" . lang("pdt_modality") . "</dt><dd>" . $product["courseModality"] . "</dd>"; ?>
      <?php if(isset($product["courseLanguage"])) echo "<dt>" . lang("pdt_courseLanguage") . "</dt><dd>" . $product["courseLanguage"] . "</dd>"; ?>
      <?php if(isset($product["courseEnrollmentFees"])) echo "<dt>" . lang("pdt_courseEnrollmentFees") . "</dt><dd>" . $product["courseEnrollmentFees"] . "</dd>"; ?>
      <?php if(isset($product["courseAdministrativeFees"])) echo "<dt>" . lang("pdt_courseAdministrativeFees") . "</dt><dd>" . $product["courseAdministrativeFees"] . "</dd>"; ?>
      <?php if(isset($product["courseBook"])) echo "<dt>" . lang("pdt_courseBook") . "</dt><dd>" . $product["courseBook"] . "</dd>"; ?>
      <?php if(isset($product["courseRequirements"])) echo "<dt>" . lang("pdt_courseRequirements") . "</dt><dd>" . $product["courseRequirements"] . "</dd>"; ?>
      <?php if(isset($product["ensuranceDuration"])) echo "<dt>" . lang("pdt_ensuranceDuration") . "</dt><dd>" . $product["ensuranceDuration"] . "</dd>"; ?>
      <?php if(isset($product["accommodationKind"])) echo "<dt>" . lang("pdt_accommodationKind") . "</dt><dd>" . $product["accommodationKind"] . "</dd>"; ?>
      <?php if(isset($product["accommodationPeopleNumber"])) echo "<dt>" . lang("pdt_accommodationPeopleNumber") . "</dt><dd>" . $product["accommodationPeopleNumber"] . "</dd>"; ?>
      <?php if(isset($product["accommodationDuration"])) echo "<dt>" . lang("pdt_accommodationDuration") . "</dt><dd>" . $product["accommodationDuration"] . "</dd>"; ?>
      <?php if(isset($product["accommodationFood"])) echo "<dt>" . lang("pdt_accommodationFood") . "</dt><dd>" . $product["accommodationFood"] . "</dd>"; ?>
      <?php if(isset($product["passTransportKind"])) echo "<dt>" . lang("pdt_passTransportKind") . "</dt><dd>" . $product["passTransportKind"] . "</dd>"; ?>
      <?php if(isset($product["passFrom"])) echo "<dt>" . lang("pdt_passFrom") . "</dt><dd>" . $product["passFrom"] . "</dd>"; ?>
      <?php if(isset($product["passTo"])) echo "<dt>" . lang("pdt_passTo") . "</dt><dd>" . $product["passTo"] . "</dd>"; ?>
      <?php if(isset($product["workKind"])) echo "<dt>" . lang("pdt_workKind") . "</dt><dd>" . $product["workKind"] . "</dd>"; ?>
      <?php if(isset($product["itens"])) {
        $i = 1;
        echo "<dt>" . lang("pdt_itens") . "</dt>";
        foreach($product["itens"] as $key => $productIten) {
          echo "<dd>" . $productIten["amount"] . " x <a href='" . base_url() . $productIten["_id"] ."' target='_blank'>" .$productIten["name"] . "</a></dd>"; 
          $i++;
        }
      }
      ?>
      <?php if(isset($product["detail"])) echo "<dl><dt>" . lang("pdt_detail") . "</dt><dd>" . nl2br($product["detail"]) . "</dd></dl>"; ?>
    </dl>
  </div>
</div>