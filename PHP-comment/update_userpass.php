<?php
/**
 * Created by 流沙
 */
//更新用户密码
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");

session_start();
if(!isset($_SESSION["user_update"])){
    header('Location: forget_pass.php');
}else{
    //require "./view/set_newpass.html";
    //更新用户信息
    if(empty($_POST))
    {
        //header('Location: register.php');
        echo "密码信息为空";
        header("Refresh:3;url=forget_pass.php");
    }else{
        if(isset($_POST["password"]) && isset($_POST["password2"])){
            $password = trim($_POST["password"]);
            $password2 = trim($_POST["password2"]);


            if($password==$password2)
            {
                $username = $_SESSION["user_update"];
                $password = md5($password);


                //$sql = "select * from users where user_name = '$username' and user_email='$email'";
                $sql = "update users set user_pass='$password' where user_name='$username'";
                $updateSQL = new MySql();
                $updateSQL->Exec($sql);
                $rows = $updateSQL->affectRows();
                if($rows==1){
                    //更新成功
                    unset($_SESSION['user_update']);
                    echo "密码更新成功,请重新登录";
                    header("Refresh:3;url=login.php");
                }else{
                    echo "密码更新失败,请重试(密码没有修改!!)";
                    header("Refresh:3;url=set_newpass.php");
                }
            }else{
                echo "密码信息错误!";
                header("Refresh:3;url=set_newpass.php");
            }

        }else{
            echo "密码信息不完整";
            header("Refresh:3;url=forget_pass.php");
        }

    }

}

