<br>
<br>
<br>
<br>
<br>

<?php
    include "./db.php";
    include './func.php';
        $Pnum = $_GET['Pnum'];
        $title = $_POST['title'];
        $cate = $_POST['cate'];
        $price = $_POST['price'];
        // $minprice = $_POST['minprice'];
        // $lastprice = $_POST['lastprice'];
        // $dateup = $_POST['dateup'];
        $content = $_POST['content'];
        // $checklist = $_POST['checklist'];
        // $date = date('Y-m-d');
        $addr = getaddr($_SESSION['userid']);
        $photo1 = $_FILES['photo1']['name'];
        $photo2 = $_FILES['photo2']['name'];
        $photo3 = $_FILES['photo3']['name'];
        $photo_directory = './img/';



        // if(strcasecmp($pwd, $pwdpwd)){
        //     $message = "비밀번호가 다릅니다";
        //     echo "<script type='text/javascript'>alert('$message')</script>";
        //     echo "<script type='text/javascript'>window.location.href='./regist.php'</script>";
        //     // echo "Some of the fields are empty. Please fill all of those information";
        //     // echo "<a href=register.php>Back to page</a>";
        //     exit();
        // }
        // else{
        //     echo "good"."<br>";
        // }
        

        // $check ="SELECT * FROM capstone_member where id = '$id'";
        // $result = mq($check);
        // if($result->num_rows == 1){
        //     ?>
             <!-- <script type='text/javascript'>alert("ID가 중복입니다. 다른ID를 사용하세요")</script>
             <script type='text/javascript'>window.location.href='./regist.php'</script> -->
             <?php
            // echo "This id is already being used";
            // echo "<a href=regist.php>Back to page</a>";
            // header("location:./regist.php");
            // exit(); 이거는 원래 왜쓰는거징 ???
        // }
        // else{
        //     echo "Okay";
        // }
        // 이걸로 비밀번호 확인, id중복확인 만들어야징

        $query = "UPDATE capstone_product SET title='$title',cate='$cate',content='$content',price=$price WHERE Pnum=$Pnum";
        $execute = mq($query);
        if($execute){
        }
        else{
            echo "error occured"."<br>";
            echo $db->error;
        }

        // if(isset($_FILES['photo1']) != ""){
        if($photo1 != ""){
            move_uploaded_file( $_FILES['photo1']['tmp_name'], $photo_directory.$photo1);
            // $Pnum = getpnum();
            $query2 = "UPDATE capstone_photo SET pname='$photo1' WHERE Pnum=$Pnum AND porder=1";
            $execute2 = mq($query2);
            if($execute2){
            }
            else{
                echo "error occured"."<br>";
                echo $db->error;
            }
        }
        if($photo2 != ""){
            move_uploaded_file( $_FILES['photo2']['tmp_name'], $photo_directory.$photo2);
            $query3 = "UPDATE capstone_photo SET pname='$photo2' WHERE Pnum=$Pnum AND porder=2";
            $execute3 = mq($query3);
            if($execute3){
            }
            else{
                echo "error occured"."<br>";
                echo $db->error;
            }
        }
        if($photo3 != ""){
            move_uploaded_file( $_FILES['photo3']['tmp_name'], $photo_directory.$photo3);
            $query4 = "UPDATE capstone_photo SET pname='$photo3' WHERE Pnum=$Pnum AND porder=3";
            $execute4 = mq($query4);
            if($execute4){
            }
            else{
                echo "error occured"."<br>";
                echo $db->error;
            }
        }
        // header("location:./read_product.php?Pnum=$Pnum");
        echo "<script type='text/javascript'>alert('수정 완료')</script>";
        echo "<script type='text/javascript'>window.location.href='./read_product.php?Pnum=$Pnum'</script>";
?>