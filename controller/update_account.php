<?php
	require "../model/Account.class.php";
	$aid = $_GET['aid'];
	$aitem = $_POST['aitem'];
	$aitem_money = $_POST['aitem_money'];
	$isrepay = $_POST['isrepay'];
	$A = new Account();
	$res = $A->updateAccount($aid,$aitem,$aitem_money,$isrepay);
	if ($res) {
		echo 1;
	} else {
		echo 0;
	}
?>