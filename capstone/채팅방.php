<?php include './필수/head.php'?>
<?php include './필수/nav.php'?>
<?php include './db.php'?>
<?php include './func.php'?>

<?php
  $TBnum = $_GET['TBnum'];
  $id = $_SESSION['userid'];
  $name = $_GET['name'];

?>

<main role="main" class="container" style="margin-top:80px">
<h4 style="text-align: center; margin-bottom: 20px;"><?php echo $name?></h4><hr>

  <?php
  $sql = mq("select * from capstone_talk where TBnum = '$TBnum' order by Tnum");
    while($talk = $sql->fetch_array(3)) {
          //content변수에 DB에서 가져온 talk을 선택
          $content = $talk["talk"]; 
      if($talk['notice'] == 1){ ?>
        <div class="jumbotron" style="padding: 1rem; margin-bottom: 0.5rem; margin-left: 5rem; margin-right: 5rem; font-weight: bold;">
          <span><?php echo $talk['talk']; ?></span>
        </div>
      <?php }
      else{
        if($talk["tfrom"] == $id){ ?>
          <div class="jumbotron" style="padding: 1rem; margin-bottom: 0.5rem; margin-left: 5rem;">
            <span><?php echo $talk['talk']; ?></span>
          </div>  
          <?php }
        else{ ?>
          <div class="jumbotron" style="padding: 1rem; margin-bottom: 0.5rem; margin-right: 5rem;">
            <span><?php echo $talk['talk']; ?></span>
          </div>
          <?php }
      }
    }?>

  <!-- <h4 style="text-align: center; margin-bottom: 20px;">(상대방 닉네임)님 과의 대화</h4><hr>
    <div class="jumbotron" style="padding: 1rem; margin-bottom: 0.5rem; margin-right: 5rem;">
      <span>어디서 거래할까요??</span>
    </div>
    <div class="jumbotron" style="padding: 1rem; margin-bottom: 0.5rem; margin-left: 5rem;">
      <span>안양역 1번출구에서 10월13일 오후4시에 만나요!</span>
    </div>
    <div class="jumbotron" style="padding: 1rem; margin-bottom: 0.5rem; margin-right: 5rem;">
      <span>네 좋아요 ㅎㅎ</span>
    </div>
    <div class="jumbotron" style="padding: 1rem; margin-bottom: 0.5rem; margin-left: 5rem;">
      <span>네 ㅎㅎ 그럼 그때 뵈요</span>
    </div> -->

    <form class="form-signin" action="create_talk.php?TBnum=<?php echo $TBnum;?>" method="post" style="margin-bottom: 1rem;">
      <hr>
      <input type="text" id="inputPassword" name="content" class="form-control" placeholder="메시지를 입력하세요." required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 5px;">전송</button>
    </form>
</main>
<script>
window.scrollTo(0,document.body.scrollHeight);
</script>

<?php include './필수/footer.php'?>