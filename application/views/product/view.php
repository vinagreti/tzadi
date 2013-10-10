<div class="row-fluid">
  <div class="span24">

    <h3><?=$product["name"]?></h3>

    <div class="row-fluid">
      <div class="span24">
        <span class="g-plus" data-action="share" data-annotation="bubble"></span>
        <span class="fb-like" data-href="<?=base_url().uri_string()?>" data-width="450" data-layout="button_count" data-show-faces="true" data-send="true"></span>
        <div class="pull-right"><a href="<?=base_url().lang("rt_currency")?>"><?=lang("tmpt_todayRates")?></a></div>
      </div>
    </div>

    <br>

    <div class="row-fluid">
      <div class="span12">
        <div class="row-fluid">
         
          <div class="span24">
            <div id="myCarousel" class="carousel slide">
              <div class="carousel-inner">
                <?php if(isset($product["img"])) {
                  foreach($product["img"] as $key => $img){
                    if($key == 0) { ?> <div class="active item"><p class="text-center"><a href="<?=base_url()?>file/open/<?=$img?>" target="blank"><img class="imgLarge" alt="160x120" src="<?=base_url()?>file/open/<?=$img?>"></p></a></div>
                    <?php } else { ?><div class="item"><p class="text-center"><a href="<?=base_url()?>file/open/<?=$img?>" target="blank"><img class="imgLarge" alt="160x120" src="<?=base_url()?>file/open/<?=$img?>"></p></a></div> <?php }
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
        </div>
      </div>

      <div class="span12">
        <dl class="dl-horizontal">
          <dt><?=lang("pdt_code")?></dt><dd><?=$product["_id"]?></dd>
          <?php if( ( ! isset($product["priceWithDiscount"]) && isset($product["humanPrice"]) ) || ( $product["priceWithDiscount"] == $product["humanPrice"] ) ) echo "<dt>" . lang("pdt_price") . "</dt><dd><strong class='text-error'>". $product["humanPrice"]."</strong></dd>"; ?>
          <?php if(isset($product["priceWithDiscount"]) && $product["priceWithDiscount"] != $product["humanPrice"] ) echo "<dt>" . lang("pdt_price") . "</dt><dd><small><strike>" . $product["humanPrice"] . "</strike></small> <strong class='text-error'> " . $product["priceWithDiscount"] ."</strong></dd>"; ?>
          <?php if(isset($product["priceConverted"])) echo "<dt>" . lang("pdt_priceConverted") . "</dt><dd> <span class='text-error'><strong> " . $product["priceConverted"] . "</strong></span></dd>"; ?>
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
        </dl>
      </div>
    </div>

    <div class="row-fluid">
      <div class="span24">
        <?php if( ! $this->session->userdata("myOrg") ){ ?><a class="knowMore btn btn-success" id="<?=$product["_id"]?>" ><?=lang("pdt_knowMore")?></a><?php } ?>
        <a class="addToBudget btn btn-warning" id="<?=$product["_id"]?>" rel="tooltip" title="<?=lang('pdt_addToBudget')?>"><?=lang('pdt_addToBudget')?></a>
        <a class="shareProductByMail btn btn-primary" href="#" id="<?=$product["_id"]?>" rel="tooltip" title="<?=lang('pdt_shareProductByMail')?>"><?=lang('pdt_shareProductByMail')?></a>
      </div>
    </div>

    <br>
    
    <div class="row-fluid">
      <div class="span24">
        <?php if(isset($product["detail"])) echo nl2br($product["detail"]); ?>
      </div>
    </div>

  </div>
</div>