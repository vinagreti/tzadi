<div class="mail">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?=lang("pdt_shareThisProduct")?></h3>
  </div>

  <div class="modal-body">

    <div class="globalModalAlert hide" id="modalAlert"><?=lang("pdt_fillAllFieldsCorrectly")?></div>

    <div class="row-fluid">
      <div class="span24">
        <label><?=lang("pdt_yourName")?>
          <span class="control-group">
            <input class="mailYourName input-block-level" type="text" value="<?=$this->session->userdata("name")?>" />
          </span>
        </label>
        <label><?=lang("pdt_adressesToSend")?>
          <span class="control-group">
            <input class="mailEmail input-block-level" type="email" />
          </span>
        </label>
        <label><?=lang("pdt_message")?>
          <span class="control-group">
            <textarea class="mailMessage input-block-level" rows="3"></textarea>
          </span>
        </label>
      </div>
    </div>

    <div class="row-fluid">
      <div class="span8">
        <img class="imgSmallMedium" src="<?=$coverImg?>"></img>
      </div>
      <div class="span16">
        <h5><?=$name?></h5>
        <p><?=lang("pdt_price")?>: <?=$currency . " " . $priceConverted?> </p>
      </div>
    </div>

  </div>

  <div class="modal-footer">
    <a class="shareProduct btn btn-primary"><?=lang("pdt_send")?></a>
    <a class="closeModal btn" data-dismiss="modal"><?=lang("pdt_cancel")?></a>
  </div>

</div>

<div id="pdt_fillAtLeastOneEmail" class="hide"><?=lang("pdt_fillAtLeastOneEmail")?></div>
<div id="pdt_fillName" class="hide"><?=lang("pdt_fillName")?></div>