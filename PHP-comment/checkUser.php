<?php
/**
 * Created by 流沙
 */

//用户登录
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
if(empty($_POST))
{
    //header('Location: register.php');
    echo "登录信息为空";
    header("Refresh:3;url=login.php");
}else{
    if(isset($_POST["user_name"]) && isset($_POST["user_pass"])){
        $usename = trim($_POST["user_name"]);
        $password = trim($_POST["user_pass"]);
        $password = md5($password);
        $sql = "select * from users where user_name='$usename' and user_pass='$password'";
        //echo $sql;
        //exit();
        $selectSQL = new MySql();
        $user_data = $selectSQL->getRow($sql);

        if($user_data!="")
        {
            session_start();
            $_SESSION["user"] = $user_data["user_name"];
            header("Location: user.php");
        }else{
            echo "用户名或者密码错误!";
            header("Refresh:3;url=login.php");
        }


    }else{
        echo "登录信息不完整";
        header("Refresh:3;url=login.php");
    }


}