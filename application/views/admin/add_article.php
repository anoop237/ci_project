<?php include_once('header.php');?>
<div class="container">
		<h3>Add Article</h3>
		<div class="row">
			<div class="col-lg-6">
				<?php if($error=$this->session->flashdata("feedback")):?>
					<div class="alert alert-danger alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Error!</strong><?php echo $error;?>
					</div> 
				<?php endif;?>
			</div>
		</div>
		<?php echo form_open_multipart('admin/store_article');?>
		<?php echo form_hidden('user',$this->session->userdata('user_id'));?>
		<?php echo form_hidden('created_on',date("Y-m-d H:i:s"));?>
		<div class="row">
			<div class="col-lg-6">
				<div clsas="form-group">
					<label for="title">Title</label>
					<?php echo form_input(array("name"=>"title","id"=>"title","class"=>"form-control","placeholder"=>"Enter title","value"=>set_value("title")));?>
				</div>
			</div>
			<div class="col-lg-6">
				<?php echo form_error("title","<div class='text-danger'>","</div>");?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div clsas="form-group">
					<label for="article">Article</label>
					<?php echo form_textarea(array("name"=>"article","id"=>"article","class"=>"form-control","placeholder"=>"Enter article","value"=>set_value("article")));?>
				</div>
			</div>
			<div class="col-lg-6">
				<?php echo form_error("article","<div class='text-danger'>","</div>");?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div clsas="form-group">
					<label for="picture">Select Image</label>
					<?php echo form_upload(array("name"=>"picture","id"=>"picture"));?>
				</div>
				<br/>
			</div>
			<div class="col-lg-6 text-danger">
				<?php 
					if(isset($upload_error))
						echo $upload_error;
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div clsas="form-group">
					<?php echo form_reset(["name"=>"reset","value"=>"Reset","class"=>"btn btn-default"]);?>
					<?php echo form_submit(["name"=>"add","value"=>"Add","class"=>"btn btn-primary"])?>
				</div>
			</div>
		</div>
	<?php echo form_close();?>
</div>
<?php include_once('footer.php');?>