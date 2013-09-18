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
            <a href="<?php echo $members_url ?>" class="btn btn-primary">Members List</a>
        </div>
    </div>
</div>
</div>
