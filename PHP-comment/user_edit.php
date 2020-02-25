<?php
/**
 * Created by 流沙
 */

//个人资料编辑界面
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["user"]))
{
    echo "无权操作本界面";
    header("Refresh:3;url=login.php");
}else{

    //获取用户信息
    $username = $_SESSION["user"];
    $sql = "select * from users where user_name='$username'";
    $userSQL = new MySql();
    $userData = $userSQL->getRow($sql);

    require "./view/user_edit.html";
}

