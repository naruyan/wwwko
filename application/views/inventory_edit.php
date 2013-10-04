<div class="container">
<form class="form-horizontal" role="form" action="<?php echo $target ?>" method="post">
    <h2><?php echo $title ?></h2>
    <div class="form-group">
        <label for="input_name" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="name" id="input_name" value="<?php echo $name ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input_description" class="col-lg-2 control-label">Description</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="description" id="input_description" value="<?php echo $description ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input_quantity" class="col-lg-2 control-label">Quantity</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="quantity" id="input_quantity" value="<?php echo $quantity ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input_price" class="col-lg-2 control-label">Price</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="price" id="input_price" value="<?php echo $price ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input_concessions" class="col-lg-2 control-label">Concessions</label>
        <div class="col-lg-10">
            <div class="checkbox">
                <input type="checkbox" value="1" name="concessions" id="input_concessions" <?php echo $concessions ?>>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="input_prizes" class="col-lg-2 control-label">Prize</label>
        <div class="col-lg-10">
            <div class="checkbox">
                <input type="checkbox" value="1" name="prizes" id="input_prizes" <?php echo $prizes ?>>
            </div>
        </div>
    </div>
    <div class="form-group text-center">
            <a href="<?php echo $back ?>" class="btn btn-lg btn-default pull-left">Back</a>
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            <?php if ($loaded) { ?>
            <a href="<?php echo $delete ?>" class="btn btn-lg btn-danger pull-right">Delete</a>
            <?php } ?>
    </div>
</form>
</div>

