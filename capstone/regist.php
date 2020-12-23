<?php include './db.php'?>
<?php include './func.php'?>
<!-- 인클루드추가 -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>지경중 - 회원가입</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

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




    <script src="//code.jquery.com/jquery-latest.min.js"></script> 
    <script>
         function getGugun(a){
           $.get("getGugun.php?sido="+a,function(data){
                $("#areaGugun").html(data); 
                $("#areaDong").html(""); 
                $("#addr").val("");  

           }); 
         }

         function getDong(a){
           $.get("getDong.php?gugun="+a,function(data){
                $("#areaDong").html(data); 
                $("#addr").val("");  
           }); 

         }
    </script>







  </head>
  <body class="text-center">

    <form class="form-signin" action="create_member.php" method="post">
      <h1 class="h3 mb-3 font-weight-normal">회원가입</h1>
      <hr>
      <h5 style="margin-top: 20px; text-align: left;">ID</h5>
        <input type="text" name="id" id="inputEmail" class="form-control" placeholder="ID" required autofocus>
      <h5 style="margin-top: 20px; text-align: left;">비밀번호</h5>
        <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Password" required>
      <h5 style="margin-top: 20px; text-align: left;">비밀번호 확인</h5>
        <input type="password" name="pwdpwd" id="inputPasswordCheck" class="form-control" placeholder="Password Check" required>
      <h5 style="margin-top: 20px; text-align: left;">닉네임</h5>
        <input type="text" name="name" id="inputName" class="form-control" placeholder="닉네임" required>
      <h5 style="margin-top: 20px; text-align: left;">주소</h5>


      <select name="sido" id="sido" onchange="getGugun(this.value);" >
                <option value="">시도를 선택하세요. </option> 
                <?
                    $db2 -> groupBy("sido");
                    $list = $db2->get("capstone_address"); 

                    foreach($list as $data){
                    ?>
                    <option value="<?=$data['sido']?>"><?=$data['sido']?></option> 
                    <? 
                    
                    }
                ?>
        </select>

        <div id="areaGugun" style="margin-top: 5px;"></div>
        <div id="areaDong" style="margin-top: 5px;"></div>

<!-- 
        <select name="addr">
          <option value="11">도농동</option>
          <option value="11">호평동</option>
          <option value="11">죽전동</option>
          <option value="11">다산동</option>
        </select> -->


  <hr>
  <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 30px;">회원가입</button>
  <button class="btn btn-lg btn-primary btn-block" type="button"><a href="index.php" style="color: white;">취소</a></button>
  <p class="mt-5 mb-3 text-muted">&copy; 김준호 이재완 진영훈</p>
</form>
</body>
</html>
