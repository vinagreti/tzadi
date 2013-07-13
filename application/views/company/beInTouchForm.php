<div class="mail">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?=lang("cpn_beInTouch")?></h3>
  </div>

  <div class="modal-body">

    <div class="globalModalAlert hide" id="modalAlert"><?=lang("cpn_fillAllFieldsCorrectly")?></div>

    <div class="row-fluid">

      <h5><?=lang("cpn_beInTouchDesc")?></h5>

      <div class="span24">
        <label><?=lang("cpn_yourName")?></label>
        <input class="name input-block-level" type="text" />
        <label><?=lang("cpn_yourEmail")?></label>
        <input class="email input-block-level" type="email" />
        <label><?=lang("cpn_leaveMessage")?></label>
        <textarea class="message input-block-level" rows="3"></textarea>
      </div>
    </div>

  </div>

  <div class="modal-footer">
    <a href="#" class="beInTouchSubmit btn btn-primary"><?=lang("cpn_send")?></a>
    <a href="#" class="closeModal btn" data-dismiss="modal"><?=lang("cpn_cancel")?></a>
  </div>

</div>