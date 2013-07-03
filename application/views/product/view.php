<h3><?=$product["name"]?></h3>

<div class="row">
  <div class="span12 well well-mini">
    <div class="row">
      <div class="span3">
        <div class="row">
          <div class="span3">
            <ul class="thumbnails">
              <li class="span3">
                <div class="thumbnail">
                  <?php if(isset($product["img"])) {?>
                    <img class="img" alt="160x120" src="<?=base_url()?>file/open/<?=$product['img']?>">
                  <?php } else { ?>
                    <img class="img" alt="160x120" src="<?=base_url()?>assets/img/no_photo_160x120.png">
                  <?php }?>
                </div>
              </li>
            </ul>
          </div>
          <div class="span3">
            <div>
              <div class="pull-left">
                <a class="addToBudget btn btn-warning" rel="tooltip" title="<?=lang('pdt_addToBudget')?>"><i class="icon-flag"></i></a>
                <a href="#" class="shareProductByMail btn btn-primary" rel="tooltip" title="<?=lang('pdt_shareProductByMail')?>"><i class="icon-group"></i></a>
              </div>
              <div class="pull-right">
                <a class="like btn" rel="tooltip" title="<?=lang('pdt_like')?>"><i class="icon-thumbs-up-alt"></i> <span class="likes"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="span9">
        <dl class="dl-horizontal">
          <?php if(isset($product["price"])) echo "<dt>" . lang("pdt_price") . "</dt><dd>" . $product["price"] . "</dd>"; ?>
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
        </dl>
      </div>
    </div>
    <div class="row">
      <div class="span12">
        <?php if(isset($product["detail"])) echo "<dl><dt>" . lang("pdt_detail") . "</dt><dd>" . $product["detail"] . "</dd></dl>"; ?>
      </div>
    </div>
  </div>
</div>