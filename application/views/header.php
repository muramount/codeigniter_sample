<!DOCTYPE html>
<html>
	<head>
		<title><?php echo isset($title) ? $title : $this->uri->uri_string(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?= base_url() ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<script type="text/javascript" src="<?= base_url() ?>/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>/js/script.js"></script>
	</head>
	<body>
