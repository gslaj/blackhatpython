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
        $sql_comment = "select * from comment order by comment_id desc";
        $commentSQL = new MySql();
        $commentData = $commentSQL->getAll($sql_comment);

        require "../view/admin_message_edit.html";
    }else{
        setcookie("admin","",time()-600);
        header('Location: index.php');
    }
}
