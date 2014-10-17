<?= doctype('html5') ?>
<html>
	<head>
		<title><?php echo isset($title) ? $title : $this->uri->uri_string(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?= base_url() ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?= base_url() ?>/css/style.css" rel="stylesheet" media="screen">
		<script type="text/javascript" src="<?= base_url() ?>/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>/js/script.js"></script>
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand" href="<?= base_url() ?>">Project name</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<!--
							<li class="active"><a href="#">Home</a></li>
							<li><a href="#about">About</a></li>
							<li><a href="#contact">Contact</a></li>
							-->
						</ul>
						<p class="navbar-text pull-right">
							<!-- Logged in as <a href="#" class="navbar-link">Username</a> -->
						</p>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row-fluid">       
				<div class="span2">
					<div class="well sidebar-nav">
						<ul class="nav nav-list">
							<li class="nav-header">user</li>
							<!-- <li class="active"><a href="#">Link</a></li> -->
							<li><?php echo anchor('user/', 'index'); ?></li>
							<li><?php echo anchor('user/add/', 'add'); ?></li>
						</ul>
					</div><!--/.well -->
				</div><!--/span-->
				<div class="span9">
