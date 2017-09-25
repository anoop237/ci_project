<?php include('header.php')?>
<div class="container">
	<h3>Admin Login</h3>
	<?php echo form_open('login/admin_login');?>
		<div class="row">
			<div class="col-lg-6">
			<?php if($error=$this->session->flashdata("login_failed")):?>
				<div class="alert alert-danger alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong><?php echo $error;?>
				</div> 
			<?php endif;?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div clsas="form-group">
					<label for="username">Username</label>
					<?php echo form_input(array("name"=>"username","id"=>"username","class"=>"form-control","placeholder"=>"Enter username","value"=>set_value("username")));?>
				</div>
			</div>
			<div class="col-lg-6">
				<?php echo form_error("username","<div class='text-danger'>","</div>");?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div clsas="form-group">
					<label for="password">Password</label>
					<?php echo form_password(array("name"=>"password","id"=>"password","class"=>"form-control","placeholder"=>"Enter password"));?>
				</div>
				<br/>
				<div clsas="form-group">
					<?php echo form_reset(["name"=>"reset","value"=>"Reset","class"=>"btn btn-default"]);?>
					<?php echo form_submit(["name"=>"submit","value"=>"Login","class"=>"btn btn-primary"])?>
				</div>
			</div>
			<div class="col-lg-6">
				<?php echo form_error("password","<div class='text-danger'>","</div>");?>
			</div>
		</div>
	<?php echo form_close();?>
</div>
<?php include('footer.php')?>
	