<?php include_once('header.php');?>
<div class="container">
		<h3>Edit Article</h3>
		<?php echo form_open('admin/update_article');?>
		<?php echo form_hidden('user',$this->session->userdata('user_id'));?>
		<?php echo form_hidden('article_id',$response->id);?>
		<div class="row">
			<div class="col-lg-6">
				<div clsas="form-group">
					<label for="title">Title</label>
					<?php echo form_input(array("name"=>"title","id"=>"title","class"=>"form-control","placeholder"=>"Enter title","value"=>set_value('title',$response->title)));?>
				</div>
			</div>
			<div class="col-lg-6">
				<?php echo form_error("title","<div class='text-danger'>","</div>");?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div clsas="form-group">
					<label for="password">Article</label>
					<?php echo form_textarea(array("name"=>"article","id"=>"article","class"=>"form-control","placeholder"=>"Enter article","value"=>set_value('article',$response->body)));?>
				</div>
				<br/>
				<div clsas="form-group">
					<?php echo form_submit(["name"=>"save","value"=>"Save","class"=>"btn btn-primary"])?>
				</div>
			</div>
			<div class="col-lg-6">
				<?php echo form_error("article","<div class='text-danger'>","</div>");?>
			</div>
		</div>
	<?php echo form_close();?>
</div>
<?php include_once('footer.php');?>