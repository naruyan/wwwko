<div class="container">
<h2><?php echo $title ?></h2>
<table class ="table table-hover table-condensed">
    <tr>
        <th>Number</th>
        <th>Name</th>
        <th>E-Mail</th>
        <th>Status</th>
        <th><?php if ($is_exec) echo 'Active' ?></th>
        <th></th>
        <th></th>
    </tr>
<?php foreach ($member_list as $member) { if ($member['active'] || $is_exec) { ?>
    <tr>
        <td><?php echo $member['number'] ?></td>
        <td><?php echo $member['name'] ?></td>
        <td><?php echo $member['email'] ?></td>
        <td><?php echo $member['status'] ?></td>
        <td><?php if ($is_exec) echo ($member['active'] ? 'Yes' : 'No') ?></td>
        <td><?php if ($is_exec) { ?>
        <a href="<?php echo $member["edit_url"] ?>" class="btn btn-default">Edit</a>
        <?php } ?></td>
        <td><?php if ($is_exec and $member['active'] == 0) { ?>
        <a href="<?php echo $member["activate_url"] ?>" class="btn btn-success">Activate</a>
        <?php } ?></td>
    </tr>
<?php }} ?>
</table>
</div>
