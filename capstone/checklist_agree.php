<?php
    include "./db.php";
    include './func.php';

    $Pnum = $_GET['Pnum']; /* Pnum변수에 Pnum값을 받아와 넣음*/
    $toid = getid($Pnum);
    $fromid = $_SESSION['userid']; 

    $check ="SELECT * FROM capstone_checklist where Pnum='$Pnum' and checker='$_SESSION[userid]'";
    $result = mq($check);
    if($result->num_rows == 1){
        echo "<script type='text/javascript'>alert('이미 확인 하셨습니다')</script>";
        echo "<script type='text/javascript'>window.location.href='./read_product.php?Pnum=$Pnum'</script>";
    }
    else{
        $query = "INSERT INTO capstone_checklist (Pnum, checker) VALUES('$Pnum','$_SESSION[userid]')";
        $execute = mq($query);
        if($execute){
        }
        else{
            echo "error occured"."<br>";
            echo $db->error;
        }        
    //capstone_checklist 테이블에 체크리스트 확인 정보 삽입

    
    // $check ="SELECT * FROM capstone_talkbox where seller = '$toid' and buyer = '$fromid'";
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
    //채팅방이 없다면 채팅방 생성

    $TBnum = getTBnum($toid, $fromid);
    $pwriter = getid($Pnum);

    $ptitle = getptitle($Pnum);
    $zz = " --- 해당 상품의 체크리스트를 확인하였습니다!!! ---관리자메시지---";


    // $TBnum = $_GET['TBnum']; //TB번호 넘겨받음
    $content = $ptitle.$zz; //내용 수정필요

    $sql = mq("select * from capstone_talkbox where (seller='$_SESSION[userid]' or buyer='$_SESSION[userid]') and TBnum=$TBnum");
    $board = $sql->fetch_array(3);
    // $query = "INSERT INTO capstone_talk (TBnum,talk,tto,tfrom) VALUES($TBnum,'$content','$board[seller]','$_SESSION[userid]')";
    $query = "INSERT INTO capstone_talk (TBnum,talk,notice) VALUES($TBnum,'$content',1)";
    $execute = mq($query);
    if($execute){
        $lasttime = getttime($TBnum);
        $query = "UPDATE capstone_talkbox SET lasttime='$lasttime', lasttalk='$content' WHERE TBnum=$TBnum";
        $execute = mq($query);
        echo "<script type='text/javascript'>window.location.href='./채팅방.php?TBnum=$TBnum&name=$board[seller]'</script>";
    }
    else{
        echo "error occured"."<br>";
        echo $db->error;
    }

}

?>