<?php
    include "./db.php";
    include './func.php';

        $id = $_POST['id'];
        $pwd = $_POST['pwd'];
        $pwdpwd = $_POST['pwdpwd'];
        $nname = $_POST['name'];
        $addr = $_POST['addr'];

        if(strcasecmp($pwd, $pwdpwd)){
            $message = "비밀번호가 다릅니다";
            echo "<script type='text/javascript'>alert('$message')</script>";
            echo "<script type='text/javascript'>window.location.href='./regist.php'</script>";
            // echo "Some of the fields are empty. Please fill all of those information";
            // echo "<a href=register.php>Back to page</a>";
            exit();
        }
       
        $check ="SELECT * FROM capstone_member where id = '$id'";
        $result = mq($check);
        if($result->num_rows == 1){
            ?>
            <script type='text/javascript'>alert("ID가 중복입니다. 다른ID를 사용하세요")</script>
            <script type='text/javascript'>window.location.href='./regist.php'</script>
            <?php
            // echo "This id is already being used";
            // echo "<a href=regist.php>Back to page</a>";
            // header("location:./regist.php");
            // exit(); 이거는 원래 왜쓰는거징 ???
        }
        // 이걸로 비밀번호 확인, id중복확인 만들어야징

        $query = "INSERT INTO capstone_member VALUES('$id','$pwd','$nname','$addr')";
        $execute = mq($query);
        if($execute){
            echo "<script type='text/javascript'>alert('회원가입 완료')</script>";
            echo "<script type='text/javascript'>window.location.href='./index.php'</script>";;

        }
        else{
            echo "error occured"."<br>";
            echo $db->error;
        }
?>