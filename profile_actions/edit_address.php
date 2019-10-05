<?php
include "../include/session.php";

if (isset($_POST['id'])) {
    $id = @$_POST['id'];

    $raddress = @$_POST['raddress'];
    $state = @$_POST['state'];
    $lga = @$_POST['lga'];

    if ($id !== 0000) {
        # code...
        if (stristr($state, 'select') == false) {
            # code...
            if (stristr($lga, 'select') == false) {
                # code...
                $edit_address = $connect->query("UPDATE `address` SET `resident_address` = '$raddress', `state` = '$state', `lga` = '$lga' WHERE `id` = '$id' AND `user_id` = '$uId'");

                echo "<div class='alert alert-success text-center'><i class='fa fa-check-double'></i> Address successfully Updated!!!</div>";

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

?>