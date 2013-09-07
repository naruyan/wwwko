<html>
<head>
<title>CM Members Signup</title>
</head>
<body>
<h2><?php echo $term ?> Member Signup</h2>
<div>
<form action="<?php echo $target ?>" method="post">
    <div>Name: <input type="text" value="" name="name" /></div>
    <div>Member Number: <input type="text" value="" name="number" /></div>
    <div>E-mail: <input type="text" value="" name="email" /></div>
    <br />
    <div>Check for repeated signups: <input type="checkbox" value="1" name="repeat" /></div>
    <input type="submit" value="Sign Up">
</form>
<form action="<?php echo $back ?>"><input type="submit" value="Back"></form>
</div>
</body>
</html>

