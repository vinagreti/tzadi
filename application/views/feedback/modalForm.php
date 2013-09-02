<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h3><?=lang("fdb_mayWeHelp")?></h3>
</div>

<div class="modal-body">

    <div class="control-group">
        <input id="feedbackMail" type="text" class="input-block-level <?=$uneditable?>" value="<?=$email?>" placeholder="<?=lang('fdb_email')?>" />
    </div>

    <div class="control-group">
        <input id="feedbackSubject" type="text" class="input-block-level" placeholder="<?=lang('fdb_subject')?>" />
    </div>
    
    <div class="control-group">
        <textarea id="feedbackMessage" class="input-block-level" placeholder="<?=lang('fdb_message')?>"></textarea>
    </div>

    <div><?=lang('fdb_referer')?>: <?=$_SERVER["HTTP_REFERER"]?></div>
</div>

<div class="modal-footer">
    <a href="#" class="tzdFeedbackSend btn btn-success"><?=lang("fdb_send")?></a>
    <a href="#" class="closeModal btn" data-dismiss="modal"><?=lang("fdb_cancel")?></a>
</div>

<div class="fdb_pleaseFillName hide"><?=lang("fdb_pleaseFillName")?></div>
<div class="fdb_pleaseFillEmail hide"><?=lang("fdb_pleaseFillEmail")?></div>
<div class="fdb_pleaseFillMessage hide"><?=lang("fdb_pleaseFillMessage")?></div>