<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<?=link_tag('assets/css/bootstrap.css')?>
		<title>Articles</title>
		<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js')?>"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#getlist").click(function(e){
					var url = "<?=base_url('test/ajax_controller/getList')?>";
					var req = $.ajax({url:url});
					req.done(function(data,status,jqXHR){
						$(".list").html(data);
						console.log(status);
					});
					req.fail(function(jqXHR,status,error){
						console.log(error);
					});
				});
			});
		</script>
		<style>
			.list_btn{
				margin: 20px 0; 
			}
			.list{
				clear:both;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<button id="getlist" class="pull-right btn btn-primary list_btn">Get List</button>
			<div class="list"></div>
		</div>
	</body>
</html>