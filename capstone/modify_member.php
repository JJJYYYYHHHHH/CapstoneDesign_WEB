<?php
    include "./db.php";
    include './func.php';

        $pwd = $_POST['pwd'];
        $npwd = $_POST['npwd'];
        $npwdpwd = $_POST['npwdpwd'];
        $nname = $_POST['name'];
        $addr = $_POST['addr'];
        $rpwd = getpwd($_SESSION['userid']);
        $rname = getname($_SESSION['userid']);
        $raddr = getaddr($_SESSION['userid']);

        if(strcasecmp($pwd, $rpwd)){
            $rmessage = "현재 비밀번호가 틀립니다";
            echo "<script type='text/javascript'>alert('$rmessage')</script>";
            echo "<script type='text/javascript'>window.location.href='./내정보수정.php'</script>";
        }

        if($npwd != ''){
            if(strcasecmp($npwd, $npwdpwd)){
                $cmessage = "변경할 비밀번호가 틀립니다";
                echo "<script type='text/javascript'>alert('$cmessage')</script>";
                echo "<script type='text/javascript'>window.location.href='./내정보수정.php'</script>";
                // echo "Some of the fields are empty. Please fill all of those information";
                // echo "<a href=register.php>Back to page</a>";
                exit();
            }
            else{
                $pwd = $npwd;
            }
        }
        // 이 else문이 필요한가 ...

        if($nname != ''){
            $rname = $nname;
        }
        if($addr != ''){
            $raddr = $addr;
        }


        $check ="UPDATE capstone_member SET pwd='$pwd', name='$rname', addr=$raddr where id = '$_SESSION[userid]'";
        $result = mq($check);
        if($result){
            $omessage = "수정 완료";
            echo "<script type='text/javascript'>alert('$omessage')</script>";
            echo "<script type='text/javascript'>window.location.href='./내정보.php'</script>";
        }
        else{
            echo "error occured"."<br>";
            echo $db->error;
        }
?>