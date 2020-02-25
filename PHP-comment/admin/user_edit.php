<?php
/**
 * Created by 流沙
 */

//展示所有留言
require "../lib/init.php";
header("Content-type:text/html;charset=utf-8");

if(!isset($_COOKIE["admin"]))
{
    header('Location: index.php');
}else{
    if($_COOKIE["admin"]=="admin")
    {
        //header('Location: admin.php');
        //查出所有留言
        $sql_user = "select * from users order by user_id desc";
        $userSQL = new MySql();
        $userData = $userSQL->getAll($sql_user);

        require "../view/admin_user_edit.html";
    }else{
        setcookie("admin","",time()-600);
        header('Location: index.php');
    }
}
