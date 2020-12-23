<?php
    include "./db.php";
    include './func.php';

    $Pnum = $_GET['Pnum']; /* Pnum변수에 Pnum값을 받아와 넣음*/
    $toid = getid($Pnum); //테스트
    $fromid = $_SESSION['userid']; //어드민
    
 
    $check ="SELECT * FROM capstone_talkbox where (seller = '$toid' and buyer = '$fromid') or (seller = '$fromid' and buyer = '$toid')";
    $result = mq($check);
    if($result->num_rows == 1){
    }
    else{
        $query = "INSERT INTO capstone_talkbox (seller, buyer) VALUES('$toid','$fromid')";
        $execute = mq($query);
        if($execute){
        }
        else{
            echo "error occured"."<br>";
            echo $db->error;
        }        
    }
    
    $TBnum = getTBnum($toid, $fromid);
    $pwriter = getid($Pnum);
    
    echo "<script type='text/javascript'>window.location.href='./채팅방.php?TBnum=$TBnum&name=$pwriter'</script>";
    // 채팅방번호랑 글작성자 넘김
?>