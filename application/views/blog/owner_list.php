<div class="row-fluid">
	<div class="span24">
		<ul class="pager">
			<li id="prev" class="previous"><a>&lsaquo;</a></li>
			<li><a href="http://<?=$this->session->userdata("identity")?>.<?=ENVIRONMENT?>/blog/<?=lang("rt_write")?>"><?=lang("blg_writePost")?></a></li>
			<li id="1" class="page disabled"><a>1</a></li>
			<li id="next" class="next"><a>&rsaquo;</a></li>
		</ul>
	</div>
</div>

<div class="row-fluid">
	<div id="posts" class="span24">
		<div class="post row-fluid hide">
			<div class="span24">
				<div class="well">
					<p class="pull-right"><small id="date"></small></p>
					<h4 id="title"></h4>
					<h5 id="subtitle"></h5>
					<small><a class="openPost" href="<?=base_url()?>blog/"><?=lang("blg_openPost")?></a></small>
					 - <small><a class="editPost"  href="<?=base_url()?>blog/<?=lang('rt_edit')?>/"><?=lang("blg_editPost")?></a></small>
					 - <small><a class="dropPost"><?=lang("blg_dropPost")?></a></small>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span24">
		<ul class="pager">
			<li id="prev" class="previous"><a>&lsaquo;</a></li>
			<li><a href="http://<?=$this->session->userdata("identity")?>.<?=ENVIRONMENT?>/blog/<?=lang("rt_write")?>"><?=lang("blg_writePost")?></a></li>
			<li id="1" class="page disabled"><a>1</a></li>
			<li id="next" class="next"><a>&rsaquo;</a></li>
		</ul>
	</div>
</div>

<div class="blg_wantToDelete hide"><?=lang("blg_wantToDelete")?></div>

<script type="text/javascript">

	var posts = <?php echo json_encode($news); ?>;

</script>