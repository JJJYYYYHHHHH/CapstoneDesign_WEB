<?php include './필수/head.php'?>
<?php include './필수/nav.php'?>
<?php include './db.php'?>
<?php include './func.php'?>

<?php
    $Pnum = $_GET['Pnum']; /* Pnum변수에 Pnum값을 받아와 넣음*/
    $sql = mq("select * from capstone_product where Pnum='$Pnum'"); /* 받아온 Pnum값을 선택 */
    $board = $sql->fetch_array();
?>

<main role="main" class="container" style="margin-top:80px">
<h1 style="text-align: center; margin-bottom: 20px;">상품 수정</h1><hr>
    <div class="jumbotron" style="padding-top: .5rem;">
      
      <form class="form-signin" action="modify_product.php?Pnum=<?php echo $board['Pnum'];?>" method="post" enctype="multipart/form-data">
      <!-- ENCTYPE="multipart/form-data" 안하면 어케대징 -->
        <h5 style="margin-top: 20px; text-align: left;">제목</h5>
         <input type="text" name="title" id="inputPassword" class="form-control" placeholder="제목을 입력하세요." value="<?php echo $board['title'] ?>" required>
        <div style="margin-top: 1rem; margin-bottom: 1rem;">
        <h5 style="margin-top: 20px; text-align: left;">카테고리</h5>
          <select name="cate">
            <option value="1">디지털/가전</option>
            <option value="2">유아동/유아도서</option>
            <option value="3">생활/가공식품</option>
            <option value="4">스포츠/레저</option>
            <option value="5">여성잡화</option>
            <option value="6">여성의류</option>
            <option value="7">남성패션/잡화</option>
            <option value="8">게임/취미</option>
            <option value="9">뷰티/미용</option>
            <option value="10">반려동물용품</option>
            <option value="11">도서/티켓/음반</option>
            <option value="12">기타</option>
          </select>
        </div>
        <!-- <h5 style="margin-top: 20px; text-align: left;">경매 여부</h5> -->
        <!-- 경매기능을 이용하시겠습니까?
          <input type="checkbox" name="경매여부" id="auctioncheck" onclick="changePriceInput()"> -->
        <?php if($board['price'] != 0){ ?>
        <h5 style="margin-top: 20px; text-align: left;">가격</h5>
          <input type="number" name="price" id="price" class="form-control" placeholder="가격" value="<?php echo $board['price'] ?>" required>
        <?php } 
        else{?>
        <span>
          <h5 style="margin-top: 20px; text-align: left;">경매 시작가</h5>
            <input type="number" name="minprice" id="auction" class="form-control" placeholder="경매 시작가" value="<?php echo $board['minprice'] ?>" disabled>
          <h5 style="margin-top: 20px; text-align: left;">즉시 낙찰가</h5>
            <input type="number" name="lastprice" id="auction" class="form-control" placeholder="즉시 낙찰가" value="<?php echo $board['maxprice'] ?>" disabled>
          <h5 style="margin-top: 20px; text-align: left;">경매 마감 날짜</h5>
            <input type="datetime" name="dateup" id="auction" class="form-control" value="<?php echo $board['auctiondate'] ?>" disabled>
        </span>
        <?php } ?>
        <h5 style="margin-top: 20px; text-align: left;">상품 설명</h5>
          <textarea name="content" rows="5" cols="30" style="width: 100%" required><?php echo $board['content'] ?></textarea>
        <h5 style="margin-top: 20px; text-align: left;">체크리스트</h5>
          <textarea name="checklist" rows="5" cols="30" style="width: 100%" disabled><?php echo $board['checklist'] ?></textarea>
        <h5 style="margin-top: 20px; text-align: left;">사진 업로드</h5>
          <?php

          ?>
          <input type="file" name="photo1" accept="image/*" id="inputPasswordCheck"><br>
          <input type="file" name="photo2" accept="image/*" id="inputPasswordCheck"><br>
          <input type="file" name="photo3" accept="image/*" id="inputPasswordCheck"><br>
          <p>변경하고 싶은 사진 위치에 업로드 해주세요.</p>
          <?php
            $sql2 = mq("select * from capstone_photo where Pnum = $Pnum order by porder");
            while($photo = $sql2->fetch_array(3)){
              $photoname = $photo["pname"];  
          ?>
          <img src="./img/<?php echo $photoname?>" style="width: 30%;">
          <?php } ?>


          <!-- 사진 장수제한 어케하지 -->
          <!-- <img src="./img/zzz2.jpg" style="width: 30%; margin-top: 1rem" > -->
        <hr>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 30px;">상품 수정</button>
        <button class="btn btn-lg btn-primary btn-block" type="button"><a href="./내가쓴글.php" style="color: white;">취소</a></button>

      </form>
    </div>
  </main>
<?php include './필수/footer.php'?>
