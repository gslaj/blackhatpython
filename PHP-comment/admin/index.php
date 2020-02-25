<?php
/**
 * Created by 流沙
 */

//后台用户登录
//使用cookie验证
if(!isset($_COOKIE["admin"]))
{
    require "../view/admin_login.html";
}else{
    if($_COOKIE["admin"]=="admin")
    {
        header('Location: admin.php');
    }else{
        setcookie("admin","",time()-600);
        header('Location: index.php');
    }
}