<div class="mail">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?=lang("mail_shareThisProduct")?></h3>
  </div>

  <div class="modal-body">

    <div class="globalModalAlert hide" id="modalAlert"><?=lang("mail_fillAllFieldsCorrectly")?></div>

    <div class="row-fluid">
      <div class="span24">
        <label><?=lang("mail_yourName")?></label>
        <input class="mailYourName input-block-level" type="text" />
        <label><?=lang("mail_adressesToSend")?></label>
        <input class="mailEmail input-block-level" type="email" />
        <label><?=lang("mail_message")?></label>
        <textarea class="mailMessage input-block-level" rows="3"></textarea>
      </div>
    </div>

    <div class="row-fluid">
      <div class="span8">
        <img src="<?=$img?>"></img>
      </div>
      <div class="span16">
        <h5><?=$name?></h5>
        <p><?=lang("mail_price")?>: <?=$price?> </p>
      </div>
    </div>

  </div>

  <div class="modal-footer">
    <a href="#" class="shareProduct btn btn-success"><?=lang("mail_send")?></a>
    <a href="#" class="closeModal" data-dismiss="modal"><?=lang("mail_cancel")?></a>
  </div>

</div>