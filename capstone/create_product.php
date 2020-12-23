<?php
    include "./db.php";
    include './func.php';
        $title = $_POST['title'];
        $cate = $_POST['cate'];
        $price = $_POST['price'];
        
        //경매
        $minprice = $_POST['minprice'];
        $maxprice = $_POST['maxprice'];
        $dateup = $_POST['dateup'];
        //ㅋㅋ

        $content = $_POST['content'];
        $checklist = $_POST['checklist'];
        $date = date('Y-m-d');
        $addr = getaddr($_SESSION['userid']);

        $lat = getlat($addr);
        $lng = getlng($addr);

        $photo1 = $_FILES['photo1']['name'];
        $photo2 = $_FILES['photo2']['name'];
        $photo3 = $_FILES['photo3']['name'];
        $photo_directory = './img/';
        $prodernum = 1;

        //경매만들즈아아아아아아
        //올바른 가격 넣엇는지 볼까
        //ㅡㅡㅡㅡㅡ예외처리ㅡㅡㅡㅡㅡ 
        //0. 경매인가 아닌가 수원왕갈비통닭
        //경매일경우
        //1. 경매시작가(minprice) >= 낙찰가 
        //2. 경매마감날짜(dateup) <= 지금날짜 
 
        if($price == ""){ //price가 공백이냐? -> 경매냐 ?
            if($minprice >= $maxprice){ // 예외1번이냐?
                echo "<script type='text/javascript'>alert('올바른 금액을 입력 해주세요')</script>";
                echo "<script type='text/javascript'>window.location.href='./상품등록.php'</script>";
            }
            if(strtotime(date(Y.m.d)) >= strtotime($dateup)){ // 예외2번이냐?
                echo "<script type='text/javascript'>alert('올바른 경매 마감 날짜를 선택 해주세요')</script>";
                echo "<script type='text/javascript'>window.location.href='./상품등록.php'</script>";
            }
            $query = "INSERT INTO capstone_product (title,cate,content,checklist,minprice,maxprice,auctiondate,pwriter,addr,lat,lng,pdate) VALUES('$title','$cate','$content','$checklist','$minprice','$maxprice','$dateup','$_SESSION[userid]',$addr,$lat,$lng,'$date')";
            $execute = mq($query);
            if($execute){
            }
            else{
                echo "error occured"."<br>";
                echo $db->error;
            }
        }
        else{
            $query = "INSERT INTO capstone_product (title,cate,content,checklist,price,pwriter,addr,lat,lng,pdate) VALUES('$title','$cate','$content','$checklist','$price','$_SESSION[userid]',$addr,$lat,$lng,'$date')";
            $execute = mq($query);
            if($execute){
            }
            else{
                echo "error occured"."<br>";
                echo $db->error;
            }    
        }

        // if(isset($_FILES['photo1']) != ""){
        $Pnum = getpnum();
        if($photo1 != ""){
            move_uploaded_file( $_FILES['photo1']['tmp_name'], $photo_directory.$photo1);
            $query2 = "INSERT INTO capstone_photo (Pnum, porder, pname) VALUES($Pnum,$prodernum,'$photo1')";
            $execute2 = mq($query2);
            if($execute2){
            }
            else{
                echo "error occured"."<br>";
                echo $db->error;
            }
            $prodernum++;
        }
        if($photo2 != ""){
            move_uploaded_file( $_FILES['photo2']['tmp_name'], $photo_directory.$photo2);
            $query3 = "INSERT INTO capstone_photo (Pnum, porder, pname) VALUES($Pnum,$prodernum,'$photo2')";
            $execute3 = mq($query3);
            if($execute3){
            }
            else{
                echo "error occured"."<br>";
                echo $db->error;
            }
            $prodernum++;
        }
        if($photo3 != ""){
            move_uploaded_file( $_FILES['photo3']['tmp_name'], $photo_directory.$photo3);
            $query4 = "INSERT INTO capstone_photo (Pnum, porder, pname) VALUES($Pnum,$prodernum,'$photo3')";
            $execute4 = mq($query4);
            if($execute4){
            }
            else{
                echo "error occured"."<br>";
                echo $db->error;
            }
        }
        echo "<script type='text/javascript'>alert('상품등록 완료')</script>";
        echo "<script type='text/javascript'>window.location.href='./read_product.php?Pnum=$Pnum'</script>";
?>