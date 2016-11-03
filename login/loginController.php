  <?php
        //必须有这句话，不然不会使用session
        require "../model/UserService.class.php";
        session_start();
        $validate="";
        if ( isset($_POST["validate"])) {
            //提取表单提交的验证码
            $validate=$_POST["validate"];
            //echo "您刚才输入的是：".$_POST["validate"]."<br>状态：";
            //判断验证码正确;
            if ($validate!=$_SESSION["authnum_session"]) {
              //验证码错误  返回 0
                echo 0;
            }
            else {
                $us = new UserService();
                $username = $_POST["username"];
                $password = $_POST["password"];
                $return_num = $us->checkUser($username,$password);
                if($return_num == 1) {
                  /*登录成功
                  信息传递到session
                  $_SESSION["username"] = $username;
                  $_SESSION["sname"] = $sname;
                  $_SESSION["hometown"] = $hometown;
                  */
                  echo 5;
                  exit();
                }
                else {
                  echo $return_num;
                }
            }
      }
      else {
            echo 4;
      }
?>
