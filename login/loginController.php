<?php
        require "../model/UserService.class.php";
         //必须有这句话，不然不会使用session
        session_start();
        $validate="";
        if (isset($_POST["validate"])) {
            //提取表单提交的验证码
            $validate=$_POST["validate"];
            //echo "您刚才输入的是：".$_POST["validate"]."<br>状态：";
            //判断验证码正确
            if ($validate!=$_SESSION["authnum_session"]) {
              //验证码错误  返回 0
                echo 0;
            }
            else {
                $us = new UserService();
                $username = $_POST["username"];
                $password = $_POST["password"];
                //用于在函数中为session传值
                $name = ""; 
                $flag = "";
                $return_num = $us->checkUser($username,$password,$name,$flag);
                //登陆成功，保存session
                if ($return_num == 1) {
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;
                    $_SESSION["name"] = $name;
                    $_SESSION["flag"] = $flag;
                }
                echo $return_num;
            }
      } else {
        echo "验证码生成失败！";
      }
?>
