<?php
/**
 * Created by 流沙
 */
header("Content-type:text/html;charset=utf-8");
abstract class aDB {
    /**
     * 连接数据库
     */
    abstract public function conn();

    /**
     * 查询多行数据
     */
    abstract public function getAll($sql);

    /**
     * 单行数据
     */
    abstract public function getRow($sql);

    /**
     * 查询单个数据 如 count(*)
     */
    abstract public function getOne($sql);

    /**
     * 执行删除/修改/更新的SQL操作
     */
    abstract public function Exec($sql);

    /**
     * 返回上一条insert语句产生的主键值
     */
    abstract public function lastId();

    /**
     * 返回上一条语句影响的行数
     */
    abstract public function affectRows();
}

class MySql extends aDB{

    public $link = null;
    public function __construct()
    {
        //加载配置文件
        $arrConfig = require "config.php";
        $this->link = new mysqli($arrConfig["host"],$arrConfig["user"],$arrConfig["password"],$arrConfig["database"]);

        $this->link->set_charset($arrConfig["charset"]);
    }

    //连接数据库
    public function conn(){
        return $this->link;
    }

    //查询多行
    public function getAll($sql){
        $res = $this->link->query($sql);
        $data = array();
        if($res) {
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    //查询单行
    public function getRow($sql){
        $res = $this->link->query($sql);
        $row = $res->fetch_assoc();
        return $row;
    }

    //查询一行
    public function getOne($sql){
        $res = $this->link->query($sql);
        $data = $res->fetch_row()[0];
        return $data;
    }

    //删除,修改,更新
    public function Exec($sql){
        $this->link->query($sql);
    }

    //影响ID
    public function lastId(){
        return $this->link->insert_id;
    }

    //影响行数
    public function affectRows(){
        return $this->link->affected_rows;
    }
}

/*
$x = new MySql();
$sql = "select * from admin";
$data = $x->getRow($sql );
var_dump($data);
*/

