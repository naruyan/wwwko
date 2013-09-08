<html>
<head>
<title><?php echo $name ?></title>
</head>
<body>
<h2><?php echo $name ?></h2>

<?php if ($write_permissions) { ?>
<div><a href="<?php echo $edit_url ?>">Edit</a></div>
<?php } ?>

<div>
<?php echo $content ?>
</div>
<div><a href="<?php echo $back_url ?>">Back to Page Listing</a></div>
</body>
</html>
