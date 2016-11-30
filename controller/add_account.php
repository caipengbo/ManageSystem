<?php
	require "../model/Account.class.php";
	if (!empty($_POST['aitem']) && !empty($_POST['aitem_money'])) {
		$account = new Account();
		$res = $account->addAccount($_POST['aitem'],$_POST['aitem_money']);
		if ($res) {
			echo 1;  //success
		} else {
			echo 0;  //failed
		}
	} else {
		echo 0; //failed
	}
?>
