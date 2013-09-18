<div id="footer">
<div class="container">
    <div class="col-lg-4 pull-left">
    <form action="<?php echo $change_terms_url ?>" role="form" method="post">
    <div class="input-group">
        <input type="text" class="form-control" value="<?php echo $term ?>" name="term">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Change Term</button>
        </span>
    </div>
    </form>
    </div>
    <div class="col-log-8">
        <div class="btn-group pull-right">
            <a href="<?php echo $signup_url ?>" class="btn btn-primary">Sign Up</a>
            <?php if ($is_exec) { ?>
            <a href="<?php echo $clubsday_url ?>" class="btn btn-primary">Clubs Day Page</a>
            <a href="<?php echo $mailinglist_url ?>" class="btn btn-primary">Mailing List</a>
            <?php } ?>
        </div>
    </div>
</div>
</div>
