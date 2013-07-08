<h1><?=lang('ct_page_p1')?></h1>
<p class="lead"><?=lang('ct_page_p2')?></br><?=lang('ct_page_p3')?></p>

<div class="control-group">
<input type="text" class="input-block-level" placeholder="<?=lang('ct_email')?>" id="email" name="email">
</div>

<div class="control-group">
<input type="text" class="input-block-level" placeholder="<?=lang('ct_subject')?>" id="subject" name="subject">
</div>

<div class="control-group">
<textarea rows="7" type="text" class="input-block-level" placeholder="<?=lang('ct_message')?>" id="message" name="message"></textarea>
</div>

<p><a src="#" class="btn btn-large btn-primary" id="submitLogin"><?=lang('ct_Send')?></a></p>


<div class="ct_insert_valid_mail hide"><?=lang("ct_insert_valid_mail")?></div>
<div class="ct_insert_subject hide"><?=lang("ct_insert_subject")?></div>
<div class="ct_insert_message hide"><?=lang("ct_insert_message")?></div>