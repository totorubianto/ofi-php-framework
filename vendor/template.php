<!DOCTYPE html>
<html>
<head>
	<title> <?php echo PROJECTNAME ?> </title>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo DESCRIPTION ?>" >
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:title" content="The Rock" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo BASE; ?>" />
	<link rel="shortcut icon" href="favicon.png">
	<meta property="og:image" content="favicon.png" />
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta name="author" content="<?php echo AUTHOR ?>">
	<meta name="google-site-verification" content="<?php echo GoogleSiteVerification ?>" />
	
		<link rel="stylesheet" type="text/css" href="<?php echo PROJECTURL ?>/assets/css/bootstrap.min.css">
		<script src="<?php echo PROJECTURL ?>/assets/js/jquery.min.js"></script>
</head>
<body>

	<?php $this->loadViewInTemplate($viewName,$viewData) ?>

		<script src="<?php echo PROJECTURL ?>/assets/js/bootstrap.min.js"></script>

</body>
</html>