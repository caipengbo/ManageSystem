<?php
	require "UseMysql.class.php";
		//商品操作
	class UserService {

		function checkUser($username,$password) {			 
		  $sql = "select password from tb_user where username='$username'";
          $db = new UseMysql();
          $res = $db->execute_dql_2($sql);
          $db->close();
          if (!empty($res)) {
          	// 待加密
            if ($res[0]["password"] == $password) {
              // 需要获取的值
              // $sname = $res[0]["sname"];
              // $sex = $res[0]["sex"];
              return 1;//正确
            } else {
            	//密码错误
            	return 2;
            }
          }
          else {
            //用户名不存在
            return 3;
          }
		}

	}
?>
	