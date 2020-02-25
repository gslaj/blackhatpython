<?php
/**
 * Created by 流沙
 */
require "./lib/init.php";
header("Content-type:text/html;charset=utf-8");
session_start();

if(empty($_POST))
{
    echo "搜索信息为空";
    header('Location: index.php');
}else{

    if(isset($_POST["search"])){

        $search  = trim($_POST["search"]);


        $sql_comment = "select * from comment where text like '%$search%' order by comment_id";
        $commentSQL = new MySql();
        $commentData = $commentSQL->getAll($sql_comment);

        //var_dump($commentData);
        require "./view/search.html";
    }else{
        echo "搜索信息为空!操作失败";
        header("Refresh:3;url=index.php");
    }
}
