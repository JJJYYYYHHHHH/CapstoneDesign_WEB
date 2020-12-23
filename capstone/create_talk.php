<?php
    include "./db.php";
    include './func.php';

        $TBnum = $_GET['TBnum']; //TB번호 넘겨받음
        $content = $_POST['content']; //내용

        $sql = mq("select * from capstone_talkbox where (seller='$_SESSION[userid]' or buyer='$_SESSION[userid]') and TBnum=$TBnum");
        $board = $sql->fetch_array(3);
        if($board['seller'] == $_SESSION['userid']){
            
            $query = "INSERT INTO capstone_talk (TBnum,talk,tto,tfrom) VALUES($TBnum,'$content','$board[buyer]','$_SESSION[userid]')";
            $execute = mq($query);
            if($execute){
                $lasttime = getttime($TBnum);
                $query = "UPDATE capstone_talkbox SET lasttime='$lasttime', lasttalk='$content' WHERE TBnum=$TBnum";
                $execute = mq($query);
                echo "<script type='text/javascript'>window.location.href='./채팅방.php?TBnum=$TBnum&name=$board[buyer]'</script>";;
            }
            else{
                echo "error occured"."<br>";
                echo $db->error;
            }
        }
        else{
            $query = "INSERT INTO capstone_talk (TBnum,talk,tto,tfrom) VALUES($TBnum,'$content','$board[seller]','$_SESSION[userid]')";
            $execute = mq($query);
            if($execute){
                $lasttime = getttime($TBnum);
                $query = "UPDATE capstone_talkbox SET lasttime='$lasttime', lasttalk='$content' WHERE TBnum=$TBnum";
                $execute = mq($query);
                echo "<script type='text/javascript'>window.location.href='./채팅방.php?TBnum=$TBnum&name=$board[seller]'</script>";;
            }
            else{
                echo "error occured"."<br>";
                echo $db->error;
            }
        }

        // $query = "INSERT INTO capstone_member VALUES('$id','$pwd','$nname','$addr')";
        // $execute = mq($query);
        // if($execute){
        //     echo "<script type='text/javascript'>alert('회원가입 완료')</script>";
        //     echo "<script type='text/javascript'>window.location.href='./index.php'</script>";;

        // }
        // else{
        //     echo "error occured"."<br>";
        //     echo $db->error;
        // }
?>