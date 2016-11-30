<?php
	require "../model/Account.class.php";
	$A = new Account();
	$res = $A->deleteAccount($_POST['aid']);
	if ($res) {
		echo 1;
	} else {
		echo 0;
	}
?>