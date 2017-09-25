<?php
	include('header.php');
?>
<div class="container">
	<?php echo anchor('admin/add_article','Add New Article',['style'=>"margin-bottom:10px" ,'class'=>"btn btn-primary pull-right"])?>
	<div style="clear:both">
		<?php if($msg=$this->session->flashdata("feedback")):?>
			<div class="alert <?=$this->session->flashdata("feedback-class")?> alert-dismissable">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong><?php echo $msg;?>
			</div> 
		<?php endif;?>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Actions</th>
			</tr
		</thead>
		<tbody>
			<?php if(count($articles)):
				$i=$this->uri->segment(3);
				foreach ($articles as $value):?>
					<tr>
						<td><?php echo ++$i;?></td>
						<td  class="text-nowrap"><?=anchor("user/articles/{$value->id}",$value->title)?></td>
						<td class="col-lg-2 col-md-6 col-sm-4">
							<div class="row">
								<div class="col-lg-5 col-sm-4">
									<?=anchor("admin/edit_article/{$value->id}","Edit",array("class"=>"btn btn-primary"));?>
								</div>
								<div class="col-lg-6 col-sm-4">
									<?=
										
										form_open("admin/delete_article"),
										form_hidden('article_id',$value->id),
										form_submit(array("name"=>"submit","id"=>"submit","value"=>"Delete","class"=>"btn btn-danger")),
										form_close();
									?>
								</div>
						</td>
					</tr>
			<?php endforeach;?>
			<?php else:?>
				<tr>
					<td colspan="3">No record found</td>
				</tr>
			<?php endif;?>
		</tbody>
	</table>
	<?= $this->pagination->create_links();?>
</div>
<?php
	include('footer.php');
?> 