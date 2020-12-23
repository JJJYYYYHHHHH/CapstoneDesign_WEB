<?php include './db.php'?>
<?php include './func.php'?>

<?php
    $Pnum = $_GET['Pnum'];
    $val = 1;

    $sql = mq("select * from capstone_product where Pnum = $Pnum");
    $board = $sql->fetch_array(3);
    if($board['pstate'] == 1){
        $val = 0;
    }

    $query = "UPDATE capstone_product SET pstate = $val WHERE Pnum = $Pnum";
    $execute = mq($query);
    if($execute){
        echo "<script type='text/javascript'>window.location.href='./read_product.php?Pnum=$Pnum'</script>";
    }
    else{
        echo "error occured"."<br>";
        echo $db->error;
    }
?>