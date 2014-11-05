<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Video store</title>
    <script src="js/jqueryCode.js" type="text/javascript"></script>
    <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="style/style.css">
<script src="js/js.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php include_once 'units/directory.php';?>
<body>

	<div class="header shadow">
		<?php include 'units/header.php';?>
	</div>
	<div class="content shadow">
		<?php require "../conf/conf.php";
        require "../models/Base.php";
        include 'units/content.php';?>
	</div>
	<div class="footer shadow">
		<?php include 'units/footer.php';?>
	</div>

</body>
</html>