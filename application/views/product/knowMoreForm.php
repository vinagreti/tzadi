<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <span class="lead"><?=lang("pdt_knowMoreThisProduct")?></span>
</div>

<div class="modal-body">

  <div class="globalModalAlert hide" id="modalAlert"><?=lang("pdt_fillAllFieldsCorrectly")?></div>

  <div class="row-fluid">
    <div class="span24">
      <label><?=lang("pdt_yourName")?>
        <span class="control-group">
          <input class="knowMoreYourName input-block-level" type="text" value="<?=$this->session->userdata("name")?>" />
        </span>
      </label>
      <label><?=lang("pdt_yourMailAddress")?>
        <span class="control-group">
          <input class="knowMoreEmail input-block-level" type="email" />
        </span>
      </label>
      <label><?=lang("pdt_questions")?>
        <span class="control-group">
          <textarea class="knowMoreQuestions input-block-level" rows="3"></textarea>
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
  <a class="knowMoreProduct btn btn-primary"><?=lang("pdt_send")?></a>
  <a class="closeModal btn" data-dismiss="modal"><?=lang("pdt_cancel")?></a>
</div>

<div id="pdt_fillValidEmail" class="hide"><?=lang("pdt_fillValidEmail")?></div>
<div id="pdt_fillName" class="hide"><?=lang("pdt_fillName")?></div>
<div id="pdt_fillQuestions" class="hide"><?=lang("pdt_fillQuestions")?></div>