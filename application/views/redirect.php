<div class="container">
<div class="alert alert-<?php echo $notice_type ?>">
<p class="text-center"><?php echo $notice ?></p>

<p class="text-center">><small>
    <?php echo Kohana::message('global', 'notice_redirect_1') ?>
    <?php echo $delay ?>
    <?php echo Kohana::message('global', 'notice_redirect_2') ?>
    <a href="<?php echo $redirect ?>">here</a>
</small</p>
</div>
</div>
