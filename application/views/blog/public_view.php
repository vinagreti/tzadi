<div class="row-fluid">
	<div class="span22 offset1">

		<ul class="pager">
	  	<li><a href="<?=base_url()?>blog/<?=lang("rt_posts")?>"><?=lang("blg_posts")?></a></li>
		</ul>

	</div>
</div>

<div class="row-fluid">
	<div class="span22 offset1">

		<div class="fb-like" data-href="<?=base_url().uri_string()?>" data-width="450" data-show-faces="true" data-send="true"></div>

		<p class="pull-right"><small><?=gmdate("d-m-Y H:i", $post["date"])?></small></p>
		<h4><?=$post["title"]?></h4>
		<h5><?=$post["subtitle"]?></h5>
		<p><?=$post["text"]?></p>

	</div>
</div>

<div class="row-fluid">
	<div class="span22 offset1">

		<ul class="pager">
	  	<li><a href="<?=base_url()?>blog/<?=lang("rt_posts")?>"><?=lang("blg_posts")?></a></li>
		</ul>

	</div>
</div>

<div id="url" class="hide"><?=$post["url"]?></div>
<div class="title hide"><?=$post["title"]?></div>