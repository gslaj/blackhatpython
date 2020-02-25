<?php
/**
 * Created by 流沙
*/
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
session_start();

if(!isset($_SESSION["user"]))
{
    echo "无权操作本界面";
    header("Refresh:3;url=login.php");
}else{
    if(!empty($_GET))
    {
        if(isset($_GET["id"]))
        {
            //删除指定的评论
            $id = trim($_GET["id"]);
            $sql = "delete from comment where comment_id=$id";
            $deleteSQL = new MySql();
            $deleteSQL->Exec($sql);

            $rows = $deleteSQL->affectRows();
            if($rows==1){

                //header("Location: user.php");
                echo "<script>alert('删除成功!');</script>";
                header("Refresh:1;url=user.php");

            }else{
                echo "删除失败,操作失败";
                header("Refresh:2;url=user.php");
            }


        }else{
            echo "操作参数不正确2";
            header("Refresh:3;url=user.php");
        }
    }else{
        echo "操作参数不正确1";
        header("Refresh:3;url=user.php");
    }

}


