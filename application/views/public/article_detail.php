<?php include('header.php')?>
<div class="container">
	<div class="pull-right"><?=date('Y-m-d',strtotime($article->created_on))?></div>
	<h3><?=$article->title?></h3>
	<div class="col-md-3">
		<img src="<?=$article->image_path?>" class="img-responsive">
	</div>
	<div class="col-md-9">
	<?=$article->body?>	
	</div>
</div>
<?php include('footer.php')?>
	