<?php
/**
 * Created by 流沙
 * 用户注册
 */

/**
 * 首先判断是否登录了
 * 如果登录了,直接进入个人界面
 */

session_start();
if(isset($_SESSION["user"])){
    header('Location: user.php');
}else{
    require "./view/register.html";
}
