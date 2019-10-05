<?php
include "../include/session.php";

if (isset($_POST['dataId'])) {
    $dataId = @$_POST['dataId'];

    $raddress = @$_POST['raddress'];
    $state = @$_POST['state'];
    $lga = @$_POST['lga'];

    if ($dataId == 0000) {
        # code...
        if (stristr($state, 'select') == false) {
            # code...
            if (stristr($lga, 'select') == false) {
                # code...
                $add_address = $connect->query("INSERT INTO `address` VALUES('', '$uId', '$raddress', '$state', '$lga')");
                echo "<div class='alert alert-success text-center'><i class='fa fa-check-double'></i> Address successfully added!!!</div>";

            } else {
                # code...
                echo "<div class='alert alert-danger text-center'><i class='fa fa-exclamation-circle'></i> Please Select your L.G.A!!!</div>";
            }

        } else {
            # code...
            echo "<div class='alert alert-danger text-center'><i class='fa fa-exclamation-circle'></i> Please Select your state!!!</div>";
        }
    }

} else {
    # code...
    echo "False";
}
