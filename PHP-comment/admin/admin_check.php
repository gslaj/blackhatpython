<?php
/**
 * Created by 流沙
 */

require "../lib/init.php";
header("Content-type:text/html;charset=utf-8");
if(empty($_POST))
{
    //header('Location: register.php');
    echo "登录信息为空";
    setcookie("admin","",time()-60);
    header("Refresh:3;url=index.php");
}else{
    if(isset($_POST["user_name"]) && isset($_POST["user_pass"])){
        $usename = trim($_POST["user_name"]);
        $password = trim($_POST["user_pass"]);
        $password = md5($password);
        $sql = "select * from admin where admin_username='$usename' and admin_password='$password'";
        //echo $sql;
        //exit();
        $selectSQL = new MySql();
        $user_data = $selectSQL->getRow($sql);

        if($user_data!="")
        {
            /*
            session_start();
            $_SESSION["user"] = $user_data["user_name"];
            header("Location: user.php");
            */
            setcookie("admin","admin",time()+1800);
            header("Location: admin.php");
        }else{
            echo "用户名或者密码错误!";
            header("Refresh:3;url=index.php");
        }
    }else{
        echo "登录信息不完整";
        header("Refresh:3;url=index.php");
    }


}
