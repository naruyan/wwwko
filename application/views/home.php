<html>
<head>
<title>CTRL-A Club Manager</title>
</head>
<body>
<h2>CTRL-A Club Manager</h2>
<div>
<?php if ($user->is_logged_in()) { ?>Welcome back <?php echo $user->username(); ?> | <?php } if ($user->is_exec()) { ?> You have exec access <?php } ?>
</div>
<div><a href="<?php echo $members_url ?>">Members List</a></div>
<div><a href="<?php echo $pages_url ?>">Wiki Pages</a></div>
</body>
</html>
