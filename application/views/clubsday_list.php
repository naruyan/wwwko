<div class="container">
<h2><?php echo $title ?></h2>
<table class ="table table-hover table-condensed">
    <tr>
        <th>E-Mail</th>
    </tr>
<?php foreach ($member_list as $member) { ?>
    <tr>
        <td><?php echo $member['email'] ?></td>
    </tr>
<?php } ?>
</table>
</div>
