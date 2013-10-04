<div class="container">
<h2><?php echo $title ?></h2>
<table class ="table table-hover table-condensed">
    <tr>
        <th>Date</th>
        <th>Price</th>
        <th></th>
    </tr>
<?php foreach ($sales_list as $sale) { ?>
    <tr>
        <td><?php echo $sale['date'] ?></td>
        <td><?php echo $sale['total_price'] ?></td>
        <td><a href="<?php echo $sale["detail_url"] ?>" class="btn btn-default">Details</a></td>
    </tr>
<?php } ?>
</table>
</div>

