<div class="container">
<h2><?php echo $title ?></h2>
<table class ="table table-hover table-condensed">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Concessions</th>
        <th>Prize</th>
        <th></th>
    </tr>
<?php foreach ($item_list as $item) { ?>
    <tr>
        <td><?php echo $item['name'] ?></td>
        <td><?php echo $item['description'] ?></td>
        <td><?php echo $item['quantity'] ?></td>
        <td><?php echo ($item['concessions'] ? 'Yes' : 'No') ?></td>
        <td><?php echo ($item['prizes'] ? 'Yes' : 'No') ?></td>
        <td><a href="<?php echo $item["edit_url"] ?>" class="btn btn-default">Edit</a></td>
    </tr>
<?php } ?>
</table>
</div>
