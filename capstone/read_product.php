<?php include './필수/head.php'?>
<?php include './필수/nav.php'?>
<?php include './db.php'?>
<?php include './func.php'?>


<main role="main" class="container" style="margin-top:80px">

<?php
    $Pnum = $_GET['Pnum']; /* Pnum변수에 Pnum값을 받아와 넣음*/
    $sql = mq("select * from capstone_product where Pnum='$Pnum'"); /* 받아온 Pnum값을 선택 */
    $board = $sql->fetch_array();

    if($board['maxprice'] == 0){ //일반 상품이냐?
?>

    <div class="jumbotron">
      <div style="margin-bottom: 1rem;">
      <?php
        $sql2 = mq("select * from capstone_photo where Pnum = $Pnum order by porder");
        while($photo = $sql2->fetch_array(3)){
          $photoname = $photo["pname"];  
      ?>
      <img src="./img/<?php echo $photoname?>" style="width: 30%;">
      <?php } ?>
      </div>
        <h3><?php echo $board['title']; ?></h3>
        <p><?php echo getaddrname($board['addr']); ?></p>



        <span style="font-weight: bold;">
          <span><?php echo $board['price']; ?> 원</span><br>
          <!-- <span>경매 낙찰가 700,000 원</span><br> -->
          <!-- <p>경매 마감 2020-10-25 00:00</p> -->
        </span>



      <!-- <form class="form-signin"> -->
      <!-- class="form-control"인풋패스워드안에 있었음 -->
      <!-- <input type="text" placeholder="입찰 금액" disabled> -->
      <!-- <button type="submit" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem;" disabled>입찰</button> -->
      <!-- </form> -->
      <hr>
      <h5 style="font-weight: bold;">상품 설명</h5>
      <p>
      <?php echo $board['content']; ?>
      </p>
      <hr>
      <h5 style="font-weight: bold;">체크리스트</h5>
      <p><?php echo $board['checklist']; ?></p>
      
      <?php
        if($board['pwriter'] != $_SESSION['userid']){
      ?>

      <form class="form-signin" action="checklist_agree.php?Pnum=<?php echo $Pnum?>" method="post">
      확인 하였습니까?
      <input type="checkbox" name="ㅋㅋㅋ" id="checkList" required>
      <button type="submit" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem;">확인</button>
      </form>
      <hr>
      <button type="button" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem;"><a href="create_talkbox.php?Pnum=<?php echo $board['Pnum'];?>" style="color: white;">판매자와 채팅하기</a></button>
      <?php } ?>                                                                                                      
    </div>
    <?php }

          //경매 상품이면
    else{ ?>
      <div class="jumbotron">
      <div style="margin-bottom: 1rem;">
      <?php
        $sql2 = mq("select * from capstone_photo where Pnum = $Pnum order by porder");
        while($photo = $sql2->fetch_array(3)){
          $photoname = $photo["pname"];  
      ?>
      <img src="./img/<?php echo $photoname?>" style="width: 30%;">
      <?php } ?>
      </div>
        <h3><?php echo $board['title']; ?></h3>
        <p><?php echo getaddrname($board['addr']); ?></p>

        <span style="font-weight: bold;">
          <span>경매 시작가 <?php echo $board['minprice']; ?> 원</span><br>
          <span>현재 입찰가 <?php echo $board['nowprice']; ?> 원</span>
          <p>즉시 낙찰가 <?php echo $board['maxprice']; ?> 원</p>
          <p>경매 마감 <?php echo $board['auctiondate']; ?></p>
        </span>

        <?php
        if($board['pwriter'] != $_SESSION['userid']){
        ?>
        <form class="form-signin" action="auctionbid.php?Pnum=<?php echo $Pnum?>" method="post">
        <!-- class="form-control"인풋패스워드안에 있었음 -->
          <input type="number" name="auctionprice" placeholder="입찰 금액" required>
          <button type="submit" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem;">입찰</button>
        </form>
        <?php } ?>

      <hr>
      <h5 style="font-weight: bold;">상품 설명</h5>
      <p>
      <?php echo $board['content']; ?>
      </p>
      <hr>
      <h5 style="font-weight: bold;">체크리스트</h5>
      <p><?php echo $board['checklist']; ?></p>
      
      <?php
        if($board['pwriter'] != $_SESSION['userid']){
      ?>

      <form class="form-signin" action="checklist_agree.php?Pnum=<?php echo $Pnum?>" method="post">
      확인 하였습니까?
      <input type="checkbox" name="ㅋㅋㅋ" id="checkList" required>
      <button type="submit" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem;">확인</button>
      </form>
      <hr>
      <button type="button" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem;"><a href="create_talkbox.php?Pnum=<?php echo $board['Pnum'];?>" style="color: white;">판매자와 채팅하기</a></button>
      <?php } ?>                                                                                                      
    </div>
    <?php } ?>
  </main>



<?php include './필수/footer.php'?>
