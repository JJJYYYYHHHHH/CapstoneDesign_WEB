<?php include './필수/head.php'?>
<?php include './필수/nav.php'?>
<?php include './db.php'?>
<?php include './func.php'?>

<form class="form-signin" action="modify_member.php" method="post" style="margin-top: 80px; padding: 2rem; ">
    <h1 class="h3 mb-3 font-weight-normal">내 정보 수정</h1>
    <hr>
    <h5 style="margin-top: 20px; text-align: left;">현재 비밀번호</h5>
      <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Password(필수)" required>
    <h5 style="margin-top: 20px; text-align: left;">변경 할 비밀번호</h5>
      <input type="password" name="npwd" id="inputPassword" class="form-control" placeholder="Password">
    <h5 style="margin-top: 20px; text-align: left;">변경 할 비밀번호 확인</h5>
      <input type="password" name="npwdpwd" id="inputPasswordCheck" class="form-control" placeholder="Password Check">
    <h5 style="margin-top: 20px; text-align: left;">닉네임</h5>
      <input type="text" name="name" id="inputName" class="form-control" placeholder="닉네임" value="<?php echo getname($_SESSION['userid'])?>">
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
    <hr>
    <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 30px;">수정하기</button>
    <button class="btn btn-lg btn-primary btn-block" type="button"><a href="내정보.php" style="color: white;">취소</a></button>
  </form>
  <?php include './필수/footer.php'?>
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


