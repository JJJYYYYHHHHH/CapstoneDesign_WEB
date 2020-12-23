<?php include './필수/head.php'?>
<?php include './필수/nav.php'?>
<?php include './db.php'?>
<?php include './func.php'?>

<main role="main" class="container" style="margin-top:80px">
  <h1 style="text-align: center; margin-bottom: 20px;">채팅 목록</h1><hr>



  <?php
  $sql = mq("select * from capstone_talkbox where seller='$_SESSION[userid]' or buyer='$_SESSION[userid]' order by lasttime desc");
    while($talk = $sql->fetch_array(3)) {
      if($talk["seller"] == $_SESSION['userid']){ ?>
        <div class="jumbotron" style="padding: 1rem;">
          <a href="채팅방.php?TBnum=<?php echo $talk['TBnum']?>&name=<?php echo $talk['buyer']?>" style="color: black;">
          <h3><?php echo $talk['buyer']?></h3>
          <?php echo $talk['lasttalk']?>
          </a>
        </div>
      <?php }
      else{?>
        <div class="jumbotron" style="padding: 1rem;">
          <a href="채팅방.php?TBnum=<?php echo $talk['TBnum']?>&name=<?php echo $talk['seller']?>" style="color: black;">
          <h3><?php echo $talk['seller']?></h3>
          <?php echo $talk['lasttalk']?>
          </a>
        </div>

      <?php }
    }

  ?>

    <!-- <div class="jumbotron" style="padding: 1rem;">
      <a href="채팅방.php" style="color: black;">
      <h3>배지순</h3>
      물건에 관심 있습니다.
      </a>
    </div> -->
  </main>

  <?php include './필수/footer.php'?>