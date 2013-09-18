<div class="container">
<form class="form-horizontal" role="form" action="<?php echo $target ?>" method="post">
    <h2><?php echo $title ?></h2>
    <div class="form-group">
        <label for="input_term" class="col-lg-2 control-label">Term</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="term" id="input_term" value="<?php echo $term ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input_name" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="name" id="input_name" value="<?php echo $name ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input_number" class="col-lg-2 control-label">Member Number</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="number" id="input_number" value="<?php echo $number ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input_email" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="email" id="input_email" value="<?php echo $email ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input_active" class="col-lg-2 control-label">Active</label>
        <div class="col-lg-10">
            <div class="checkbox">
                <input type="checkbox" value="1" name="active" id="input_active" <?php echo $active ?>>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="input_status" class="col-lg-2 control-label">Member Status</label>
        <div class="col-lg-10">
        <select name="status" class="form-control" id="input_status">
            <option value="<?php echo $status ?>"><?php echo $statuses[$status] ?></option>
            <?php foreach($statuses as $k => $s) { ?>
            <option value="<?php echo $k ?>"><?php echo $s ?></option>
            <?php } ?>
        </select>
        </div>
    </div>
    <div class="form-group text-center">
            <a href="<?php echo $back ?>" class="btn btn-lg btn-default pull-left">Back</a>
            <button type="submit" class="btn btn-lg btn-primary">Edit</button>
            <a href="<?php echo $delete ?>" class="btn btn-lg btn-danger pull-right">Delete</a>
    </div>
</form>
</div>
