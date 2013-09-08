<html>
<head>
<title>Pages List</title>
</head>
<body>
<h2>Pages</h2>
<?php foreach ($pages as $page) { ?>
<div><a href="<?php echo $page["url"] ?>"><?php echo $page["name"] ?></a></div>
<?php } ?>
</body>
</html>
