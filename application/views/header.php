<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">CTRL-A</a>    
    </div>
    <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li class="<?php echo $home_active ?>"><a href="<?php echo $home_url ?>">Home</a></li>
        <li class="dropdown <?php echo $members_active ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo $members_list_url ?>">List</a></li>
                <li><a href="<?php echo $members_signup_url ?>">Sign Up</a></li>
            </ul>
        </li>
        <?php if ($is_exec) { ?>
        <li class="<?php echo $inventory_active ?>"><a href="<?php echo $inventory_url ?>">Inventory</a></li>
        <li class="dropdown <?php echo $sales_active ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sale <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo $sales_list_url ?>">Sales List</a></li>
                <li><a href="<?php echo $sales_add_url ?>">New Sale</a></li>
            </ul>
        </li>
        <li class="dropdown <?php echo $clubsday_active ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clubs Day <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo $clubsday_list_url ?>">Mailing List</a></li>
                <li><a href="<?php echo $clubsday_signup_url ?>">Sign Up</a></li>
            </ul>
        </li>
        <?php } ?>
    </ul>
    <div class="nav navbar-nav navbar-right navbar-text">
        <?php if ($is_logged_in) { ?>
        Logged in as <?php echo $username ?> <?php if ($is_exec) { ?><span class="label label-primary">Exec</span><?php } ?>
        <?php } else { ?>
        <a href="<?php echo $signin_url ?>" class="btn btn-success">Sign In</a>
        <?php } ?>
    </div>
    </div>
</div>
</nav>
