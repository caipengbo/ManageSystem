<?php
	//datagrid 分页显示
	//为了加快加载速度，使用面向过程的方法加载分页数据
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	//用于检索
	$sid = isset($_POST['sid']) ? mysql_real_escape_string($_POST['sid']) : '';
	$starttime = isset($_POST['starttime']) ? mysql_real_escape_string($_POST['starttime']) : '';
	$endtime = isset($_POST['endtime']) ? mysql_real_escape_string($_POST['endtime']) : '';
	$username = isset($_POST['username']) ? mysql_real_escape_string($_POST['username']) : '';

	$offset = ($page-1)*$rows;
	$result = array();
	$conn = mysqli_connect('localhost','root','','db_managesystem');
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$where = " where sid like '%$sid%' and username like '%$username%'";
	if ($starttime != "" && $endtime != "") {
		$where .= " and stime between '$starttime' and '$endtime'";
	} else if ($starttime != "" && $endtime == "") {
		$where .= " and stime > '$starttime'";
	} else if ($starttime == "" && $endtime != "") {
		$where .= " and stime < '$endttime'";
	}
	$rs = mysqli_query($conn,"select count(*) from  tb_sale".$where);
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$sql = "select * from tb_sale ". $where ." order by stime desc limit $offset,$rows";
	//echo $sql;
	$rs = mysqli_query($conn,$sql);
	$rows = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($rows, $row);
	}
	$result["rows"] = $rows;
	echo json_encode($result);
	
?>