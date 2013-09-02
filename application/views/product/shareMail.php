<p><?=$message?></p>

<h3><?=$product["name"]?></h3>

<div class="row-fluid">
  <div class="span24 well well-mini">
    
    <div class="row-fluid">
      <div class="span24">
        <a href="<?=base_url() . $product['_id']?>"><img class="img" src="<?=$product['img']?>"></a>
      </div>
    </div>

    <div class="row-fluid">
      <div class="span24">
        <?php if(isset($product["price"])) echo "<p>" . lang("pdt_price") . ": " . $product["price"] . "</p>"; ?>
        <?php if(isset($product["detail"])) echo "<p>" . lang("pdt_detail") . ": " . $product["detail"] . "</p>"; ?>
        <?php if(isset($product["courseDuration"])) echo "<p>" . lang("pdt_courseDuration") . ": " . $product["courseDuration"] . "</p>"; ?>
        <?php if(isset($product["courseKind"])) echo "<p>" . lang("pdt_courseKind") . ": " . $product["courseKind"] . "</p>"; ?>
        <?php if(isset($product["coursePeriod"])) echo "<p>" . lang("pdt_period") . ": " . $product["coursePeriod"] . "</p>"; ?>
        <?php if(isset($product["courseModality"])) echo "<p>" . lang("pdt_modality") . ": " . $product["courseModality"] . "</p>"; ?>
        <?php if(isset($product["courseLanguage"])) echo "<p>" . lang("pdt_courseLanguage") . ": " . $product["courseLanguage"] . "</p>"; ?>
        <?php if(isset($product["courseEnrollmentFees"])) echo "<p>" . lang("pdt_courseEnrollmentFees") . ": " . $product["courseEnrollmentFees"] . "</p>"; ?>
        <?php if(isset($product["courseAdministrativeFees"])) echo "<p>" . lang("pdt_courseAdministrativeFees") . ": " . $product["courseAdministrativeFees"] . "</p>"; ?>
        <?php if(isset($product["courseBook"])) echo "<p>" . lang("pdt_courseBook") . ": " . $product["courseBook"] . "</p>"; ?>
        <?php if(isset($product["courseRequirements"])) echo "<p>" . lang("pdt_courseRequirements") . ": " . $product["courseRequirements"] . "</p>"; ?>
        <?php if(isset($product["ensuranceDuration"])) echo "<p>" . lang("pdt_ensuranceDuration") . ": " . $product["ensuranceDuration"] . "</p>"; ?>
        <?php if(isset($product["accommodationKind"])) echo "<p>" . lang("pdt_accommodationKind") . ": " . $product["accommodationKind"] . "</p>"; ?>
        <?php if(isset($product["accommodationPeopleNumber"])) echo "<p>" . lang("pdt_accommodationPeopleNumber") . ": " . $product["accommodationPeopleNumber"] . "</p>"; ?>
        <?php if(isset($product["accommodationDuration"])) echo "<p>" . lang("pdt_accommodationDuration") . ": " . $product["accommodationDuration"] . "</p>"; ?>
        <?php if(isset($product["accommodationFood"])) echo "<p>" . lang("pdt_accommodationFood") . ": " . $product["accommodationFood"] . "</p>"; ?>
        <?php if(isset($product["passTransportKind"])) echo "<p>" . lang("pdt_passTransportKind") . ": " . $product["passTransportKind"] . "</p>"; ?>
        <?php if(isset($product["passFrom"])) echo "<p>" . lang("pdt_passFrom") . ": " . $product["passFrom"] . "</p>"; ?>
        <?php if(isset($product["passTo"])) echo "<p>" . lang("pdt_passTo") . ": " . $product["passTo"] . "</p>"; ?>
        <?php if(isset($product["workKind"])) echo "<p>" . lang("pdt_workKind") . ": " . $product["workKind"] . "</p>"; ?>
      </div>
    </div>

  </div>
</div>