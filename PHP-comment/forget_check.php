<?php
/**
 * Created by 流沙
 */
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
if(empty($_POST))
{
    //header('Location: register.php');
    echo "登录信息为空";
    header("Refresh:3;url=forget_pass.php");
}else{
    if(isset($_POST["user_name"]) && isset($_POST["user_email"])){
        $username = trim($_POST["user_name"]);
        $email = trim($_POST["user_email"]);
        $sql = "select * from users where user_name = '$username' and user_email='$email'";
        $selectSQL = new MySql();
        $user_data = $selectSQL->getRow($sql);

        if($user_data!="")
        {
            session_start();
            $_SESSION["user_update"] = $user_data["user_name"];
            header("Location: set_newpass.php");
        }else{
            echo "验证信息错误!";
            header("Refresh:3;url=forget_pass.php");
        }
    }else{
        echo "验证信息不完整";
        header("Refresh:3;url=forget_pass.php");
    }

}
