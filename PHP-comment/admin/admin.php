<?php
/**
 * Created by 流沙
 */

if(!isset($_COOKIE["admin"]))
{
    header('Location: index.php');
}else{
    if($_COOKIE["admin"]=="admin")
    {
        //header('Location: admin.php');
        //用户管理
        require "../view/admin_index.html";

    }else{
        setcookie("admin","",time()-600);
        header('Location: index.php');
    }
}