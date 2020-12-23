<?php include './필수/head.php'?>
<?php include './필수/nav.php'?>
<?php include './db.php'?>
<?php include './func.php'?>

<main role="main" class="container" style="margin-top:80px">
<h1 style="text-align: center; margin-bottom: 20px;">내가 쓴 글</h1>
  <?php
    // board테이블에서 bnum를 기준으로 내림차순해서 표시
    $sql = mq("select * from capstone_product where pwriter='$_SESSION[userid]' order by Pnum desc");
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
          </a><br>
            <button type="button" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem; margin-top: 1rem;"><a href="상품수정.php?Pnum=<?php echo $board['Pnum'];?>" style="color: white;">수정</a></button>
            <button type="button" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem;"><a href="delete_product.php?Pnum=<?php echo $board['Pnum'];?>" id="mya" onclick="return confirm('해당 상품을 삭제 하시겠습니까?');" style="color: white;">삭제</a></button>
            <?php if($board['pstate'] == 0){ ?>
              <button type="button" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem;"><a href="change_state.php?Pnum=<?php echo $board['Pnum'];?>" id="mya" onclick="return confirm('판매 완료 하시겠습니까?');" style="color: white;">판매 완료</a></button>
            <?php }
            else{ ?>
              <button type="button" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem;"><a href="change_state.php?Pnum=<?php echo $board['Pnum'];?>" id="mya" onclick="return confirm('판매중으로 변경 하시겠습니까?');" style="color: white;">판매중으로 변경</a></button>
            <?php } ?>
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
          </a><br>
            <button type="button" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem; margin-top: 1rem;"><a href="상품수정.php?Pnum=<?php echo $board['Pnum'];?>" style="color: white;">수정</a></button>
            <button type="button" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem;"><a href=".php?Pnum=<?php echo $board['Pnum'];?>" id="mya" onclick="return confirm('해당 상품을 삭제 하시겠습니까?');" style="color: white;">삭제</a></button>
            <?php if($board['pstate'] == 0){ ?>
              <button type="button" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem;"><a href="change_state.php?Pnum=<?php echo $board['Pnum'];?>" id="mya" onclick="return confirm('판매 완료 하시겠습니까?');" style="color: white;">판매 완료</a></button>
            <?php }
            else{ ?>
              <button type="button" style="background-color: #007bff; border-color: #007bff; color: #fff; border-radius: .3rem; border: 1px; padding: .15rem .5rem;"><a href="change_state.php?Pnum=<?php echo $board['Pnum'];?>" id="mya" onclick="return confirm('판매중으로 변경 하시겠습니까?');" style="color: white;">판매중으로 변경</a></button>
            <?php } ?>
        </div>
      <?php }
    } ?>
</main>

  <?php include './필수/footer.php'?>
