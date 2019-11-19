<?php include './include/header.php';?>

<div class="w3l_banner_nav_right">
    <div class="w3l_banner_nav_right_banner4">
        <h3>Best Deals For New Products<span class="blink_me"></span></h3>
    </div>
    <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
        <h3>List of shops</h3>
        <br />
            <div class="col-md-12">
                <br />
                <?php
            $query = "SELECT * FROM shops";
            $run_query = mysqli_query($connect, $query) or die(mysqli_error($connect));
            if (mysqli_num_rows($run_query) > 0) {
            while ($row = mysqli_fetch_assoc($run_query)) {
              $shop_id = $row['shop_id'];
              $shop_name = $row['shop_name'];
                ?>      
                <button type="button" class="btn btn-labeled btn-lg btn-default">
                    <span class="btn-label">
                    <a href="pet.php?=<?php echo $shop_id; ?>"><img class="img-fluid" src="./images/online-store.png" style="width: 80px;"><span class="text-dark"></span></a></span><?php echo $shop_name; ?></button>
                                       
            <?php }} ?>
            <br> 
            </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- //banner -->

<?php include './include/footer.php';?>