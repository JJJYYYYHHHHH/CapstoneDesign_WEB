<?php include './필수/head.php'?>
<?php include './필수/nav.php'?>
<?php include './func.php'?>



<main role="main" class="container" style="margin-top:80px">
<h1 style="text-align: center; margin-bottom: 20px;">상품 등록</h1><hr>
    <div class="jumbotron" style="padding-top: .5rem;">
      
      <form class="form-signin" action="create_product.php" method="post" enctype="multipart/form-data">
      <!-- ENCTYPE="multipart/form-data" 안하면 어케대징 -->
        <h5 style="margin-top: 20px; text-align: left;">제목</h5>
         <input type="text" name="title" id="inputPassword" class="form-control" placeholder="제목을 입력하세요." required>
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
        <h5 style="margin-top: 20px; text-align: left;">경매 여부</h5>
        경매기능을 이용하시겠습니까?
          <input type="checkbox" name="auctioncheck" id="auctioncheck" onclick="changePriceInput(this.form)">
        <h5 style="margin-top: 20px; text-align: left;">가격</h5>
          <input type="number" name="price" id="price" class="form-control" placeholder="가격" required>
        <span>
          <h5 style="margin-top: 20px; text-align: left;">경매 시작가</h5>
            <input type="number" name="minprice" id="auction" class="form-control" placeholder="경매 시작가" disabled>
          <h5 style="margin-top: 20px; text-align: left;">즉시 낙찰가</h5>
            <input type="number" name="maxprice" id="auction" class="form-control" placeholder="낙찰가" disabled>
          <h5 style="margin-top: 20px; text-align: left;">경매 마감 날짜</h5>
            <input type="date" name="dateup" id="auction" class="form-control" disabled>
        </span>
        <h5 style="margin-top: 20px; text-align: left;">상품 설명</h5>
          <textarea name="content" rows="5" cols="30" style="width: 100%" required></textarea>
        <h5 style="margin-top: 20px; text-align: left;">체크리스트</h5>
          <textarea name="checklist" rows="5" cols="30" style="width: 100%" required></textarea>
        <h5 style="margin-top: 20px; text-align: left;">사진 업로드</h5>
          <input type="file" name="photo1" accept="image/*" id="inputPasswordCheck"><br>
          <input type="file" name="photo2" accept="image/*" id="inputPasswordCheck"><br>
          <input type="file" name="photo3" accept="image/*" id="inputPasswordCheck"><br>
          <!-- 사진 장수제한 어케하지 -->
          <!-- <img src="./img/zzz2.jpg" style="width: 30%; margin-top: 1rem" > -->
        <hr>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 30px;">상품 등록</button>
        <button class="btn btn-lg btn-primary btn-block" type="button"><a href="home.php" style="color: white;">취소</a></button>

      </form>

    </div>
  </main>
<!-- 
  <script>
    function changePriceInput(){
      document.getElementById("auction").disabled = false;
      document.getElementById("price").disabled = true;
    }

  </script> -->
<!-- <script>
  function LoadImg(value) {
    if(value.files && value.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#LoadImg').attr('src', e.target.result);
      } 
    reader.readAsDataURL(value.files[0]);
    }
  }
</script> -->

<script language="javascript">
function changePriceInput(form){
  if( form.auctioncheck.checked == true ){
  form.price.disabled = true;
  form.minprice.required = false;
  form.price.value = "";
  form.minprice.disabled = false;
  form.minprice.required = true;
  form.maxprice.disabled = false;
  form.maxprice.required = true;
  form.dateup.disabled = false;
  form.dateup.required = true;
  } else {
   form.price.disabled = false;
   form.price.required = true;
   form.minprice.disabled = true;
   form.minprice.required = false;
   form.minprice.value = "";
   form.maxprice.disabled = true;
   form.maxprice.required = false;
   form.maxprice.value = "";
   form.dateup.disabled = true;
   form.dateup.required = false;
   form.dateup.value = "";
    }
}
</script>

<?php include './필수/footer.php'?>
