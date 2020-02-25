<?php
/**
 * Created by 流沙
 */

session_start();
if(isset($_SESSION["user"])){
    header('Location: user.php');
}else{
    require "./view/login.html";
}
