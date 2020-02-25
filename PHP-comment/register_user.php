<?php
/**
 * Created by 流沙
 */

//接收注册信息,进行处理
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
if(empty($_POST))
{
    //header('Location: register.php');
    echo "注册信息为空";
    header("Refresh:3;url=register.php");
}else{
    if((isset($_POST["user_pass"]))&&(isset($_POST["user_pass2"])))
    {
        $user_pass = trim($_POST["user_pass"]);
        $user_pass2 = trim($_POST["user_pass2"]);

        if($user_pass!=$user_pass2)
        {
            echo "密码不一致";
            header("Refresh:2;url=register.php");
        }else{
            $user_name = $_POST["user_name"];
            $user_email = $_POST["user_email"];
            $user_pic="./upload/default/pic.jpg";
            $user_pass = md5($user_pass);
            /*
            var_dump($_POST);
            exit();
            */
            $sql = "insert into users(user_name,user_email,user_pass,user_pic,join_date) values('$user_name','$user_email','$user_pass','$user_pic',DATE_FORMAT(NOW(),'%Y-%m-%d'))";

            $inserSQL = new MySql();
            $inserSQL->Exec($sql);
            //var_dump($data);
            $rows = $inserSQL->affectRows();
            if($rows==1){
                //注册成功
                session_start();
                $_SESSION["user"] = $user_name;
                header("Location: user.php");
            }else{
                echo "用户名或者邮件重复,请重新注册";
                header("Refresh:3;url=register.php");
            }
        }
    }else{
        echo "注册信息错误";
        header("Refresh:3;url=register.php");
    }
}
