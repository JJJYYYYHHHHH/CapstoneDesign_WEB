<?php include './필수/head.php'?>
<?php include './필수/nav.php'?>
<?php include './db.php'?>
<?php include './func.php'?>

<main role="main" class="container" style="margin-top:80px">
    
    <?php
      $key = $_POST['key'];
      $addr = getaddr($_SESSION['userid']);
      $lat = getlat($addr);
      $latp = $lat+0.1;
      $latm = $lat-0.1;
      $lng = getlng($addr);
      $lngp = $lng+0.13;
      $lngm = $lng-0.13;


      // board테이블에서 bnum를 기준으로 내림차순해서 표시
      $sql = mq("select * from capstone_product where lat between $latm and $latp and lng between $lngm and $lngp and title like '%$key%' order by Pnum desc");
      // limit 0,10삭제함 
      
      while($board = $sql->fetch_array(3)){
        //경매와 노경매 출력을 다르게함
        //일반 상품이냐???
        if($board['maxprice'] == 0){
          ?>
          <div class="jumbotron">
            <a href="read_product.php?Pnum=<?php echo $board['Pnum'];?>" style="color: black;">
            <h3><?php echo $board['title']; ?></h3>
            <p><?php echo getaddrname($board['addr']); ?></p>
            <p><?php echo $board['price']; ?> 원</p>
            <?php
              $sql2 = mq("select * from capstone_photo where Pnum = $board[Pnum] order by porder" );
              while($photo = $sql2->fetch_array(3)){
                $photoname = $photo["pname"];  
            ?>
            <img src="./img/<?php echo $photoname?>" style="width: 30%;">
            <?php } ?>
            </a>
          </div>
        <?php } 
        // 경매상품일때
        else{ ?> 
          <div class="jumbotron"> 
            <a href="read_product.php?Pnum=<?php echo $board['Pnum'];?>" style="color: black;">
            <h3><?php echo $board['title']; ?></h3>
            <p><?php echo getaddrname($board['addr']); ?></p>
            <span>경매 시작가 <?php echo $board['minprice']; ?> 원</span><br>
            <span>현재 입찰가 <?php echo $board['nowprice']; ?> 원</span>
            <p>즉시 낙찰가 <?php echo $board['maxprice']; ?> 원</p>
            <?php
              $sql2 = mq("select * from capstone_photo where Pnum = $board[Pnum] order by porder" );
              while($photo = $sql2->fetch_array(3)){
                $photoname = $photo["pname"];  
            ?>
            <img src="./img/<?php echo $photoname?>" style="width: 30%;">
            <?php } ?>
            </a>
          </div>
        <?php }
      } ?>


  </main>

  <?php include './필수/footer.php'?>