<?php
/**
 * Created by 流沙
 */

session_start();
if(!isset($_SESSION["user_update"])){
    header('Location: forget_pass.php');
}else{
    require "./view/set_newpass.html";
}
