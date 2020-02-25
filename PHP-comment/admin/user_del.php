<?php
/**
 * Created by 流沙
 */

require "../lib/init.php";
header("Content-type:text/html;charset=utf-8");

if(!isset($_COOKIE["admin"]))
{
    header('Location: index.php');
}else{
    if($_COOKIE["admin"]=="admin")
    {
        //开始删除操作
        if(isset($_GET["id"]))
        {
            $id = trim($_GET["id"]);
            $sql = "delete from users where user_id=$id";
            $deleteSQL = new MySql();
            $deleteSQL->Exec($sql);

            $rows = $deleteSQL->affectRows();
            if($rows==1){

                //header("Location: user.php");
                echo "<script>alert('删除成功!');</script>";
                header("Refresh:1;url=user_edit.php");

            }else{
                echo "删除失败,操作失败";
                header("Refresh:2;url=user_edit.php");
            }


        }else{
            echo "没有删除参数";
            header("Refresh:3;url=user_edit.php");
        }


    }else{
        setcookie("admin","",time()-600);
        header('Location: index.php');
    }
}
