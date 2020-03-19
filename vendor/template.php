<!DOCTYPE html>
<html>
<head>
	<title> <?php echo PROJECTNAME ?> </title>
	<meta charset="utf-8">
	<meta name="description" content="sangat mempesona banyumas" >
	<meta  name="key" content="google">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href=" <?php echo BASE ?>/assets/css/bootstrap.min.css">
</head>
<body>

	<?php $this->loadViewInTemplate($viewName,$viewData) ?>
	
	<script src="<?php echo BASE ?>/assets/js/jquery.min.js"></script>
	<script src="<?php echo BASE ?>/assets/js/bootstrap.min.js"></script>

</body>
</html>