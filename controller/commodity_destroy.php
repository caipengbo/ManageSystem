<?php
	require "../model/CommodityService.class.php";
	// session  username
	if (!empty($_POST['cid'])&&!empty($_POST['dnum'])) {
		if ($_POST['dnum']>0) {
			$CS = new CommodityService();
			$res = $CS->reduceNum($_POST['cid'],$_POST['dnum']);
			if ($res) {
				$res = $CS->insertDestroyInfo($_POST['cid'],$_POST['dnum'],$_POST['statement']);; 
				if ($res) {
					echo 1;//success
				} else {
					$CS->addNum($_POST['cid'],$_POST['dnum']); //rollback add
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
