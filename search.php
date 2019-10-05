<?php include "connectinc.php";

    if (isset($_GET['q'])) {
        $s_string = @$_GET['q'];
    }

    $result1 = null;
    $result2 = null;

    $s_sqli = $connect->query("SELECT * FROM `items` WHERE (`item_name` LIKE '%$s_string%') OR (`item_info` LIKE '%$s_string%') ORDER BY `id` DESC LIMIT 0, 10");
    $countI = $s_sqli->num_rows;
    
    if ($countI > 0) {
        # code...
        while ($getI = $s_sqli->fetch_array()) {
            $pic = $getI['item_pic'];
            $name = $getI['item_name'];
            $class = $getI['item_class'];
            $cat = $getI['item_category'];
            $details = $getI['item_info'];
            // $price = $getI['price'];
            // $cSign = $getI['currency'];

            $sd = "<b class='h6 text-primary'>$s_string</b>";
            $repsd = str_ireplace($s_string, $sd, $details);

            $s = "<b class='h6 text-primary'>$s_string</b>";
            $rep = str_ireplace($s_string, $s, $name);

            if (stristr($name, "$s_string") != false) {
                # code...
                $result1 = "
                    <span class='result'>
                        <a href='search?q={$name}'>
                            <div class='bg-white border-bottom'>
                                <img src='{$pic}' class='img-fluid' width='40px' />
                                <small class='text-muted'>Search for</small> $rep <small class='text-muted'>in $cat Category</small>
                            </div>
                        </a>
                    </span>
                ";
            } else {
                $result1 = null;
            }

            if ((stristr($details, $s_string) != false) && (stristr($name, "$s_string") == false)) {
                $result2 = "
                    <span class='result'>
                        <a href='search?q={$details}'>
                            <div class='bg-white border-bottom'>
                                <img src='{$pic}' class='img-fluid' width='40px' /> <small class='text-muted'>Search for</small> $repsd <small class='text-muted'>in $class</small>
                            </div>
                        </a>
                    </span>
                ";
            } else {
                $result2 = null;
            }

            echo "{$result1} {$result2}";
        }

    } else {
        # code...
        echo "Not Found";
    }
?>