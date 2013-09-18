<div class="container">
<form class="form-horizontal" role="form" action="<?php echo $target ?>" method="post">
    <h2><?php echo $title ?></h2>
    <div class="form-group">
        <label for="input_name" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="name" id="input_name" placeholder="Name" autofocus>
        </div>
    </div>
    <div class="form-group">
        <label for="input_number" class="col-lg-2 control-label">Member Number</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="number" id="input_number" placeholder="Member Number (doesn't have to be a number)">
        </div>
        <div class="col-lg-offset-2 col-lg-10">If you want to enter a non-standard character try using this <a href="http://shapecatcher.com/index.html" target="_blank">online site</a></div>
    </div>
    <div class="form-group">
        <label for="input_email" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
            <input type="email" class="form-control" name="email" id="input_email" placeholder="Email" >
        </div>
    </div>
    <?php if ($is_exec) { ?>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <div class="checkbox">
                <input type="checkbox" value="1" name="repeat" <?php echo $repeat ?>> Check for repeated signups
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-5">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Sign Up</button>
        </div>
        <div class="col-lg-5">
            <a href="<?php echo $back ?>" class="btn btn-lg btn-default btn-block">Back</a>
        </div>
    </div>
</form>
</div>
