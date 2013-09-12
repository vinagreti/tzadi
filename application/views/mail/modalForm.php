<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h3><?=lang("mail_sendMessage")?></h3>
</div>

<div class="modal-body">

    <div class="control-group">
        <input id="mailSubject" type="text" class="input-block-level" placeholder="<?=lang('mail_mailSubject')?>" />
    </div>
    
    <div class="control-group">
        <textarea id="mailMessage" rows="10" class="input-block-level" placeholder="<?=lang('mail_mailMessage')?>"></textarea>
    </div>

</div>

<div class="modal-footer">
    <a class="send btn btn-success"><?=lang("mail_send")?></a>
    <a class="closeModal btn" data-dismiss="modal"><?=lang("mail_cancel")?></a>
</div>

<div id="mail_pleaseFillSubject" class="hide"><?=lang("mail_pleaseFillSubject")?></div>
<div id="mail_pleaseFillMessage" class="hide"><?=lang("mail_pleaseFillMessage")?></div>