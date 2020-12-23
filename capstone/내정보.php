<?php include './필수/head.php'?>
<?php include './필수/nav.php'?>
<?php include './db.php'?>
<?php include './func.php'?>


<main role="main" class="container" style="margin-top:80px">
    <h1 style="text-align: center; margin-bottom: 20px;"><?php echo getname($_SESSION['userid']) ?></h1><hr>
    <div class="jumbotron">
      <a href="내정보수정.php" id="mya">
      <h3 id="myh3">내 정보 수정</h3>
      </a>
    </div>
    <div class="jumbotron">
      <a href="내가쓴글.php" id="mya">
      <h3 id="myh3">내가 쓴 글</h3>
      </a>
    </div>
    <div class="jumbotron">
      <a href="delete_member.php" id="mya" onclick="return confirm('회원탈퇴 하시겠습니까?');">
      <h3 id="myh3">회원탈퇴</h3>
      </a>
    </div>
    <div class="jumbotron">
      <a href="./logout.php" id="mya"  onclick="return confirm('로그아웃 하시겠습니까??');">
      <h3 id="myh3">로그아웃</h3>
      </a>
    </div>
  </main>





  <?php include './필수/footer.php'?>