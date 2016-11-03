  <?php
        //必须有这句话，不然不会使用session
        session_start();
        $validate="";
        if ( isset($_POST["validate"])) {
        //提取表单提交的验证码
        $validate=$_POST["validate"];
        //echo "您刚才输入的是：".$_POST["validate"]."<br>状态：";
        //判断session值与用户输入的验证码是否一致;
        if ($validate!=$_SESSION["authnum_session"]) {
          //验证码错误  返回 0
          header("Location:../login.php?errno=0");
          exit();
        }
        else {
          $sid = $_POST["sid"];
          $password = $_POST["password"];
          $sname = "";
          $us = new StuService();
          $sex = "";
          $age = "";
          $iid = "";
          $iname = "";
          $hometown = "";
          $return_num = $us->checkUser($sid,$password,$sname,$sex,$age,$iid,$iname,$hometown);
          if($return_num == 3) {
            $_SESSION["sid"] = $sid;
            $_SESSION["sname"] = $sname;
            $_SESSION["sex"] = $sex;
            $_SESSION["age"] = $age;
            $_SESSION["iid"] = $iid;
            $_SESSION["iname"] = $iname;
            $_SESSION["hometown"] = $hometown;
            header("Location:../index.php");
            exit();
          }
          else {
            header("Location:../login.php?errno=$return_num");
            exit();
          }
        }
      }
      else {
        echo "没验证吗";
        exit();
      }
    ?>
