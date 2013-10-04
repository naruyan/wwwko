<div class="container">
    <h2><?php echo $title ?></h2>
    <div class="form-group">
        <label for="input_date" class="col-lg-2 control-label">Date</label>
        <div class="col-lg-10">
            <p class="form-control-static" id="input_date"><?php echo $date ?></p>
        </div>
    </div>
    <hr>
    <div class="form-group col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Items</h3>
            </div>
            <div class="panel-body">
                <label class="col-lg-8 control-label">Item Name</label>
                <label class="col-lg-2 control-label">Quantity</label>
                <label class="col-lg-2 control-label">Total Price</label>
                <?php foreach ($items as $item) { ?>
                <div class="col-lg-8">
                    <p class="form-control-static"><?php echo $item['name'] ?></p>
                </div>
                <div class="col-lg-2">
                <p class="form-control-static"><?php echo $item['quantity'] ?></p>
                </div>
                <div class="col-lg-2">
                <p class="form-control-static"><?php echo $item['total_price'] ?></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="input_price" class="col-lg-2 control-label">Total Price</label>
        <div class="col-lg-10">
            <p class="form-control-static" id="input_price"><?php echo $price ?></p>
        </div>
    </div>
    <div class="form-group text-center">
            <a href="<?php echo $back ?>" class="btn btn-lg btn-default pull-left">Back</a>
            <a href="<?php echo $delete ?>" class="btn btn-lg btn-danger pull-right">Delete</a>
    </div>
</div>


