<div class="row-fluid">
	<div class="span24">

		<ul class="pager">
	  	<li><a href="<?=base_url()?>blog/<?=lang("rt_posts")?>"><?=lang("blg_posts")?></a></li>
	  	<li><a href="http://<?=$this->session->userdata("identity")?>.<?=ENVIRONMENT?>/blog/<?=lang("rt_write")?>"><?=lang("blg_writePost")?></a></li>
		</ul>

	</div>
</div>

<div class="row-fluid">
	<div class="span24">

		<p class="pull-right"><small><?=gmdate("d-m-Y H:i", $post["date"])?></small></p>
		<h4 id="title"><?=$post["title"]?></h4>
		<h5><?=$post["subtitle"]?></h5>
		<p><?=$post["text"]?></p>

		<div class="row-fluid">
			<div class="span12">
				<a class="btn btn-info btn-block" href="<?=base_url()?>blog/<?=lang('rt_edit')?>/<?=$post['url']?>"><?=lang("blg_editPost")?></a>
			</div>
			<div class="span12">
				<a id="<?=$post["url"]?>" class="dropPost btn btn-danger btn-block"><?=lang("blg_dropPost")?></a>
			</div>
		</div>

	</div>
</div>

<div class="row-fluid">
	<div class="span24">

		<ul class="pager">
	  	<li><a href="<?=base_url()?>blog/<?=lang("rt_posts")?>"><?=lang("blg_posts")?></a></li>
	  	<li><a href="http://<?=$this->session->userdata("identity")?>.<?=ENVIRONMENT?>/blog/<?=lang("rt_write")?>"><?=lang("blg_writePost")?></a></li>
		</ul>

	</div>
</div>
<div class="title hide"><?=$post["title"]?></div>
<div class="blg_wantToDelete hide"><?=lang("blg_wantToDelete")?></div>