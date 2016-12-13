<?php
  session_start();
  unset($_SESSION);
  session_destroy();
  if (isset($_SESSION['name']) ) {
    echo 1; //退出失败
  }
  else {
    echo 2; //退出成功
  }
?>
