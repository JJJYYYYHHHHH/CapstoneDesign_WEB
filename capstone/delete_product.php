<?php include './db.php'?>
<?php include './func.php'?>
<?php
    $Pnum = $_GET['Pnum']; /* Pnum변수에 Pnum값을 받아와 넣음*/
    $sql = mq("delete from capstone_product where Pnum='$Pnum';");
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<script type='text/javascript'>window.location.href='./내가쓴글.php'</script>
