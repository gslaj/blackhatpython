<?php
/**
 * Created by 流沙
 */

//退出当前用户
session_start();
//销毁session
unset($_SESSION["user"]);
header("Location: login.php");


