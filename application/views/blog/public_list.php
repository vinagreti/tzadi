<div class="row-fluid">
	<div class="span22 offset1">
		<ul class="pager">
			<li id="prev" class="previous"><a>&lsaquo;</a></li>
			<li id="1" class="page disabled"><a>1</a></li>
			<li id="next" class="next"><a>&rsaquo;</a></li>
		</ul>
	</div>
</div>

<div class="row-fluid">
	<div id="posts" class="span22 offset1">
		<div class="post row-fluid hide">
			<div class="span24">
				<div class="well">
					<p class="pull-right"><small id="date"></small></p>
					<h4 id="title"></h4>
					<h5 id="subtitle"></h5>
					<small><a class="openPost" href="<?=base_url()?>blog/"><?=lang("blg_openPost")?></a></small>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span22 offset1">
		<ul class="pager">
			<li id="prev" class="previous"><a>&lsaquo;</a></li>
			<li id="1" class="page disabled"><a>1</a></li>
			<li id="next" class="next"><a>&rsaquo;</a></li>
		</ul>
	</div>
</div>


<script type="text/javascript">

	var posts = <?php echo json_encode($news); ?>;

</script>