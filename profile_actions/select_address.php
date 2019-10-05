<?php include "../include/session.php"; ?>

<?php
    if (isset($_POST['add_id'])) {
        #code...
        $add_id = @$_POST['add_id'];
        $update_add_id = $connect->query("UPDATE `users` SET `address_id` = '$add_id'");
        if ($update_add_id) {
            # code...
            ?>
            <div class="alert alert-success"><i class="fa fa-check-circle"></i> Delivery Address has been successfully changed... Address <?php echo "$add_id";?> selected!!!</div>
            <?php
        } else {
            # code...
            ?>
            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Selection Failed, please try again...</div>
            <?php
        }


    } else {
        # code...
        $add_id = null;
        ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There has been an error, please try again...</div>
        <?php
    }
?>