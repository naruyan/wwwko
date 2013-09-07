<html>
<head>
<title>CM Members Edit</title>
</head>
<body>
<h2><?php echo $term ?> Member Edit</h2>
<div>
<form action="<?php echo $target ?>" method="post">
<div>Term: <input type="text" value="<?php echo $term ?>" name="term" /></div>
    <div>Name: <input type="text" value="<?php echo $name ?>" name="name" /></div>
    <div>Member Number: <input type="text" value="<?php echo $number ?>" name="number" /></div>
    <div>E-mail: <input type="text" value="<?php echo $email ?>" name="email" /></div>
    <div>Active: <input type="checkbox" name="active" value="1" <?php if ($active) { ?>checked<?php } ?>  /></div>
    <div>Status: <select name="status">
        <option value="<?php echo $status ?>"><?php echo $statuses[$status] ?></option>
        <?php foreach($statuses as $k => $s) { ?>
        <option value="<?php echo $k ?>"><?php echo $s ?></option>
        <?php } ?>
    </select></div>
    <div><input type="submit" value="Edit"></div>
</form>
<form action="<?php echo $back ?>"><input type="submit" value="Back"></form>
</div>
</body>
</html>


