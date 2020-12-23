<?php
	include './db.php';
	include './func.php';
    // session_start();
    
    // delete_mamber($_SESSION);


	$sql = mq("delete from capstone_member where id='$_SESSION[userid]';");

?>

<script type="text/javascript">alert("삭제되었습니다.");</script>
<script type='text/javascript'>window.location.href='./index.php'</script>

<?php
	if(isset($_SESSION['userid'] )){
		unset($_SESSION['userid']);
		session_destroy();
		exit();
	}
	else{
		echo "error occured";
	}
?>
