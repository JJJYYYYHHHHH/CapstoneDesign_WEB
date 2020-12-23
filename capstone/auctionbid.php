<?php include './db.php'?>
<?php include './func.php'?>

<?php
    $auctionprice = $_POST['auctionprice'];
    $Pnum = $_GET['Pnum'];
    $toid = getid($Pnum);
    $fromid = $_SESSION['userid']; 

    $sql = mq("select * from capstone_product where Pnum=$Pnum"); /* 받아온 Pnum값을 선택 */
    $board = $sql->fetch_array(3);

    //예외처리
    //0. 체크리스트 확인 여부
    //1. 경매시작가 > 입찰가
    //1.1 현재가 > 입찰가
    //2. 즉시낙찰가 > 입찰가
    //3. 경매마감날짜 > 현재날짜
    $check2 ="SELECT * FROM capstone_checklist where Pnum='$Pnum' and checker='$_SESSION[userid]'";
    $result2 = mq($check2);

    if($board['minprice'] > $auctionprice || $board['nowprice'] >= $auctionprice || $board['maxprice'] < $auctionprice || strtotime($board['auctiondate']) <= strtotime(date(Y.m.d)) || $result2->num_rows == 0){
        if($board['minprice'] > $auctionprice){
            echo "<script type='text/javascript'>alert('입찰 금액이 경매 시작가보다 낮습니다')</script>";
            echo "<script type='text/javascript'>window.location.href='./read_product.php?Pnum=$Pnum'</script>";
        }
        if($board['nowprice'] >= $auctionprice){
            echo "<script type='text/javascript'>alert('입찰 금액이 현재가보다 낮거나 같습니다')</script>";
            echo "<script type='text/javascript'>window.location.href='./read_product.php?Pnum=$Pnum'</script>";
        }
        if($board['maxprice'] < $auctionprice){
            echo "<script type='text/javascript'>alert('입찰 금액이 즉시 낙찰가보다 높습니다')</script>";
            echo "<script type='text/javascript'>window.location.href='./read_product.php?Pnum=$Pnum'</script>";
        }
        if(strtotime($board['auctiondate']) <= strtotime(date(Y.m.d))){
            echo "<script type='text/javascript'>alert('경매가 마감되었습니다')</script>";
            echo "<script type='text/javascript'>window.location.href='./read_product.php?Pnum=$Pnum'</script>";
        }
        if($result2->num_rows == 0){
            echo "<script type='text/javascript'>alert('체크리스트 확인 후 입찰하실 수 있습니다')</script>";
            echo "<script type='text/javascript'>window.location.href='./read_product.php?Pnum=$Pnum'</script>";
        }
    }
    else{
        if($board['maxprice'] == $auctionprice){ //즉시낙찰시 판매완료, 해당 채팅방으로 이동
            $query = "UPDATE capstone_product SET nowprice = $auctionprice, bidder = '$_SESSION[userid]', pstate = 1 WHERE Pnum=$Pnum";
            $execute = mq($query);
            if($execute){
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
                        echo "1";
                        echo "error occured"."<br>";
                        echo $db->error;
                    }        
                }
                //채팅방이 없다면 채팅방 생성
            
                $TBnum = getTBnum($toid, $fromid);
                $pwriter = getid($Pnum);
                $ptitle = getptitle($Pnum);
                $zz = " --- 해당 상품을 ";
                $zz2 = "원에 즉시 낙찰하였습니다!!! ---관리자메시지---";
                $content = $ptitle.$zz.$auctionprice.$zz2;
            
                $sql = mq("select * from capstone_talkbox where (seller='$_SESSION[userid]' or buyer='$_SESSION[userid]') and TBnum=$TBnum");
                $board = $sql->fetch_array(3);
                // $query = "INSERT INTO capstone_talk (TBnum,talk,tto,tfrom) VALUES($TBnum,'$content','$board[seller]','$_SESSION[userid]')";
                $query = "INSERT INTO capstone_talk (TBnum,talk,notice) VALUES($TBnum,'$content',1)";
                $execute = mq($query);
                if($execute){
                    $lasttime = getttime($TBnum);
                    $query = "UPDATE capstone_talkbox SET lasttime='$lasttime', lasttalk='$content' WHERE TBnum=$TBnum";
                    $execute = mq($query);
                    echo "<script type='text/javascript'>alert('즉시낙찰!!!!!!!')</script>";
                    echo "<script type='text/javascript'>window.location.href='./채팅방.php?TBnum=$TBnum&name=$board[seller]'</script>";
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
        else{
            $query = "UPDATE capstone_product SET nowprice = $auctionprice, bidder = '$_SESSION[userid]' WHERE Pnum=$Pnum";
            $execute = mq($query);
            if($execute){
                echo "<script type='text/javascript'>alert('입찰 완료')</script>";
                echo "<script type='text/javascript'>window.location.href='./read_product.php?Pnum=$Pnum'</script>";
            }
            else{
                echo "4";
                echo "error occured"."<br>";
                echo $db->error;
            }
        }
    }
?>