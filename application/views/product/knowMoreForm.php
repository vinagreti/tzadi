<div class="mail">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?=lang("pdt_knowMoreThisProduct")?></h3>
  </div>

  <div class="modal-body">

    <div class="globalModalAlert hide" id="modalAlert"><?=lang("pdt_fillAllFieldsCorrectly")?></div>

    <div class="row-fluid">
      <div class="span24">
        <label><?=lang("pdt_yourName")?></label>
        <input class="knowMoreYourName input-block-level" type="text" />
        <label><?=lang("pdt_yourMailAddress")?></label>
        <input class="knowMoreEmail input-block-level" type="email" />
        <label><?=lang("pdt_questions")?></label>
        <textarea class="knowMoreQuestions input-block-level" rows="3"></textarea>
      </div>
    </div>

    <div class="row-fluid">
      <div class="span8">
        <img class="imgSmallMedium" src="<?=$coverImg?>"></img>
      </div>
      <div class="span16">
        <h5><?=$name?></h5>
        <p><?=lang("pdt_price")?>: <?=$currency . " " . $price?> </p>
      </div>
    </div>

  </div>

  <div class="modal-footer">
    <a href="#" class="knowMoreProduct btn btn-primary"><?=lang("pdt_send")?></a>
    <a href="#" class="closeModal btn" data-dismiss="modal"><?=lang("pdt_cancel")?></a>
  </div>

</div>

<div id="pdt_fillValidEmail" class="hide"><?=lang("pdt_fillValidEmail")?></div>
<div id="pdt_fillName" class="hide"><?=lang("pdt_fillName")?></div>
<div id="pdt_fillQuestions" class="hide"><?=lang("pdt_fillQuestions")?></div>