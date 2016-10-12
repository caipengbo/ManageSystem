<?php
	require "../model/CommodityService.class.php";
	// session  username
	if (!empty($_POST['cid'])&&!empty($_POST['rednum'])) {
		if ($_POST['rednum']>0) {
			$CS = new CommodityService();
			$res = $CS->reduceNum($_POST['cid'],$_POST['rednum']);
			if ($res) {
				//session username
				$res = $CS->insetSaleInfo($_POST['cid'],$_POST['sprice'],$_POST['rednum'],"username"); 
				if ($res) {
					echo 1;//success
				} else {
					$CS->addNum($_POST['cid'],$_POST['rednum']); //rollback add
					echo 0; //failed
				}
			} else {
				echo 0;  //failed
			}
		} else {
			echo 0;
		}
	} else {
		echo 0; //failed
	}
?>
