<!-- 홈페이지 접속 시 처음 뜨는 로그인 화면임 -->

<?php
  include './db.php';
  include './func.php';

	session_start();

	if(isset($_SESSION['userid'])){
		$message = "로그인 되어 있습니다";
		echo "<script type='text/javascript'>alert('$message')</script>";
		echo "<script type='text/javascript'>window.location.href='./home.php'</script>";
	}
?>
<!-- 코드의 맨 위에 php 파일을 삽입해 만약 user가 이미 로그인을 한 상태 즉 userid 세션 변수가 이미 설정되어 있으면 유저를 home.php (메인 페이지)로 돌려보냄 -->



<!-- 로그인 페이지 -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>지역기반 경매시스템 중고거래 플랫폼 --지경중--</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/"> -->

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
    </style>
    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="./login_check.php" method="POST">
      <h3>진영훈의 포트폴리오<br>환영합니다.</h3>
      <h4>ID: jin</br>PWD: 1111<br>위 아이디로 로그인하시면 등록된 더미데이터를 확인하실 수 있습니다.</h4>
      <br><hr><h5>본 페이지는 모바일 브라우저에 최적화 되어있습니다.</h5><hr>
      <h1 class="h3 mb-3 font-weight-normal">로그인</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="id" id="inputEmail" class="form-control" placeholder="ID" required autofocus>
        <!-- maxlength 쓸까 말까 -->
      <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">로그인</button> 
        <button class="btn btn-lg btn-primary btn-block" type="button"><a href="regist.php" style="color: white;">회원가입</a></button>
      <p class="mt-5 mb-3 text-muted">Copyrigth © KIM LEE JIN</p>
    </form>
  </body>
</html>
