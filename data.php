<?php

	$arr = array(
			// array(gmdate("M d Y", mktime(0, 0, 0, 1, 1, 2016)),0.9648),
			// array(gmdate("M d Y", mktime(0, 0, 0, 2, 1, 2016)),0.7118),
			// array(gmdate("M d Y", mktime(0, 0, 0, 3, 1, 2016)),0.048),
			// array(gmdate("M d Y", mktime(0, 0, 0, 4, 1, 2016)),1.7148),
			// array(gmdate("M d Y", mktime(0, 0, 0, 5, 1, 2016)),2.7648),
			// array(gmdate("M d Y", mktime(0, 0, 0, 6, 1, 2016)),0.7648),
			// array(gmdate("M d Y", mktime(0, 0, 0, 8, 1, 2016)),0.7648),
			 array("2016-10-1",0.7648),
			 array("2016-11-2",0.348),
			  array("2016-13-3",0.348),
			  array("2016-12-4",0.6648),
			  array("2016-11-5",0.7648),
			  array("2016-11-6",0.7648),
			  array("2016-11-7",0.7648),
			  array("2016-11-8",0.7648),
			  array("2016-11-9",0.7648),
			  array("2016-11-10",0.7648),
			  array("2016-11-11",0.7648),
			  array("2016-11-12",0.7648),
		);
	echo $_GET['callback'].'('. json_encode($arr) . ')';    





?>
