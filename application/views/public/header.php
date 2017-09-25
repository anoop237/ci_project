<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<?=link_tag('assets/css/bootstrap.css')?>
		<title>Articles</title>
		<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js')?>"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="<?=base_url('user')?>">Articles</a>
		    </div>
		    <ul class="nav navbar-nav">
		    	<li>
		    		<?=anchor('user/index',"Home")?>
		    	</li>
		    </ul>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="<?=base_url('login')?>">Login</a></li>
		      </ul>
		      <form class="navbar-form navbar-right" role="search" action="<?=base_url("user/search")?>" method="post">
		        <div class="form-group">
		          <input type="text"  name="search_query" class="form-control" placeholder="Search">
		        </div>
		        <button type="submit" class="btn btn-default">Submit</button> 
		      </form>
		    </div>
		  </div>
		</nav>