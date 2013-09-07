<html>
<head>
<title>CM Members List</title>
</head>
<body>
<h2><?php echo $term ?> Member List</h2>
<table>
<?php foreach ($member_list as $member) { ?>
    <tr>
        <td><?php echo $member['number'] ?></td>
        <td><?php echo $member['name'] ?></td>
        <td><?php echo $member['email'] ?></td>
        <td><?php echo $member['status'] ?></td>
        <td><?php if ($is_exec) echo $member['active'] ?></td>
        <td><?php if ($is_exec) { ?>
        <a href="<?php echo $member["edit_url"] ?>">Edit</a>
        <?php } ?></td>
        <td><?php if ($is_exec and $member['active'] == 0) { ?>
        <a href="<?php echo $member["activate_url"] ?>">Activate</a>
        <?php } ?></td>
    </tr>
<?php } ?>
</table>
<div><a href="<?php echo $signup_url ?>">Sign Up</a></div>
<div><form action="<?php echo $change_terms_url ?>" method="post">
    Change Terms: <input type="text" value="<?php echo $term ?>" name="term" />
    <input type="submit" value="Change">
</form></div>
</body>
</html>
