<?php

    $u = @$_REQUEST["user"];
    $p = @$_REQUEST["pass"];

    echo "这是前端的ajax发送的数据，现在再还给前端:".$u."-------".$p;

?>

<?php
    // 1.登录mysql，选择数据库
    $link = @new mysqli("localhost:3306","root","root","test");
    if($link->connect_error){
        echo $link->connect_error;
    }

    // 2.$link->query()向mysql发送命令
    // 增
    // $q = "INSERT stu (name,sex,age) VALUES('admin','1',16)";
    // $res = $link->query($q);
    // if($res){
    //     echo "insert ok";
    // }else{
    //     echo "insert no ok";
    // }

    // 删
    // $q = "DELETE FROM stu WHERE id=6";
    // $res = $link->query($q);
    // if($res){
    //     echo "delete ok";
    // }else{
    //     echo "delete no ok";
    // }

    // 改
    // $q = "UPDATE stu SET name='root' WHERE id=6";
    // $res = $link->query($q);
    // if($res){
    //     echo "update ok";
    // }else{
    //     echo "update no ok";
    // }

    // 查
    $q = "SELECT * FROM stu";
    $res = $link->query($q);
    if($res){
        echo "select ok";
    }else{
        echo "select no ok";
    }
?>
