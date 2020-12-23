<!-- 서버호스팅이 아닌 웹 호스팅인 관계로 배치스케쥴러 동작 불가로인한 수작업 필요.......ㅠ -->
<!-- 서버호스팅이 아닌 웹 호스팅인 관계로 배치스케쥴러 동작 불가로인한 수작업 필요.......ㅠ -->
<!-- 서버호스팅이 아닌 웹 호스팅인 관계로 배치스케쥴러 동작 불가로인한 수작업 필요.......ㅠ -->
<!-- 서버호스팅이 아닌 웹 호스팅인 관계로 배치스케쥴러 동작 불가로인한 수작업 필요.......ㅠ -->
<!-- 서버호스팅이 아닌 웹 호스팅인 관계로 배치스케쥴러 동작 불가로인한 수작업 필요.......ㅠ -->
<!-- 서버호스팅이 아닌 웹 호스팅인 관계로 배치스케쥴러 동작 불가로인한 수작업 필요.......ㅠ -->
<!-- 서버호스팅이 아닌 웹 호스팅인 관계로 배치스케쥴러 동작 불가로인한 수작업 필요.......ㅠ -->

<?php include './db.php'?>
<?php include './func.php'?>
<?php
    // $today = date('Y-m-d');
    $today = '2020-11-26';
    $midnight = " 00:00:00";
    $today = $today.$midnight;
    $sql = mq("select * from capstone_product where auctiondate = '$today' and bidder is not null");
    while($board = $sql->fetch_array(3)){
        $query = "UPDATE capstone_product SET pstate = 1 WHERE Pnum = $board[Pnum]"; //판매완료로 상태 변경
        $execute = mq($query);
        if($execute){
            $TBnum = getTBnum($board['pwriter'], $board['bidder']);
            $zz = " --- 해당 상품이 ";
            $zz2 = "원에 낙찰되었습니다!!! ---관리자메시지---";
            $content = $board['title'].$zz.$board['nowprice'].$zz2;
        
            $sql2 = mq("select * from capstone_talkbox where TBnum=$TBnum");
            $board2 = $sql2->fetch_array(3);
            $query2 = "INSERT INTO capstone_talk (TBnum,talk,notice) VALUES($TBnum,'$content',1)";
            $execute = mq($query2);
            if($execute){
                $lasttime = getttime($TBnum);
                $query3 = "UPDATE capstone_talkbox SET lasttime='$lasttime', lasttalk='$content' WHERE TBnum=$TBnum";
                $execute = mq($query3);
                if($execute){
                    echo "<script type='text/javascript'>alert('배치 프로그램 동작 완료')</script>";
                    echo "<script type='text/javascript'>window.location.href='./home.php'</script>";
                }
                else{
                    echo "1";
                    echo "error occured"."<br>";
                    echo $db->error;
                }
            }    
            else{
                echo "2";
                echo "error occured"."<br>";
                echo $db->error;
            }
        }
        else{
            echo "3";
            echo "error occured"."<br>";
            echo $db->error;
        }
    }
?>