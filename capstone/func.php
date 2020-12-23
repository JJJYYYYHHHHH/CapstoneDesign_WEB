
<?php
function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}

	function test($res)
	{
		global $row;
		$row = $res;
	}

	function getname($id)
	{
		global $row;
		$check = "SELECT * FROM capstone_member WHERE id = '$id'";
		$result = mq($check);
		test($result->fetch_array(3));
		return $row['name'];
	}

	function getaddr($id)
	{
		global $row;
		$check = "SELECT * FROM capstone_member WHERE id = '$id'";
		$result = mq($check);
		test($result->fetch_array(3));
		return $row['addr'];
	}




	function getlat($addr)
	{
		global $row;
		$check = "SELECT * FROM capstone_address WHERE addr = '$addr'";
		$result = mq($check);
		test($result->fetch_array(3));
		return $row['lat'];
	}
	function getlng($addr)
	{
		global $row;
		$check = "SELECT * FROM capstone_address WHERE addr = '$addr'";
		$result = mq($check);
		test($result->fetch_array(3));
		return $row['lng'];
	}




	function getaddrname($addr)
	{
		global $row;
		$check = "SELECT * FROM capstone_address WHERE addr = '$addr'";
		$result = mq($check);
		test($result->fetch_array(3));
		return $row['dong'];
	}

	function getpwd($id)
	{
		global $row;
		$check = "SELECT * FROM capstone_member WHERE id = '$id'";
		$result = mq($check);
		test($result->fetch_array(3));
		return $row['pwd'];
	}

	function getid($pnum)
	{
		global $row;
		$check = "SELECT * FROM capstone_product WHERE Pnum = '$pnum'";
		$result = mq($check);
		test($result->fetch_array(3));
		return $row['pwriter'];
	}

	function delete_member($id)
	{
		global $row;
		$check = "DELETE FROM capstone_member WHERE id = '$id'";
		$result = mq($check);
	}

	function getpnum()
	{
		global $row;
		$check = "SELECT max(Pnum) FROM capstone_product";
		$result = mq($check);
		test($result->fetch_array(3));
		return $row['max(Pnum)'];
	}

	function getTBnum($seller, $buyer)
	{
		global $row;
		$check = "SELECT * FROM capstone_talkbox WHERE (seller = '$seller' AND buyer = '$buyer') OR (seller = '$buyer' AND buyer = '$seller')";
		$result = mq($check);
		test($result->fetch_array(3));
		return $row['TBnum'];
	}

	function getttime($TBnum)
	{
		global $row;
		$check = "SELECT * FROM capstone_talk WHERE TBnum='$TBnum' ORDER BY ttime DESC";
		$result = mq($check);
		test($result->fetch_array(3));
		return $row['ttime'];
	}

	function getptitle($Pnum)
	{
		global $row;
		$check = "SELECT * FROM capstone_product WHERE Pnum='$Pnum'";
		$result = mq($check);
		test($result->fetch_array(3));
		return $row['title'];
	}
?>
