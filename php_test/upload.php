<?php

    // $upload_dir=getcwd()."\\pic\\"; //getcwd()获取当前脚本目录
    // if(!is_dir($upload_dir)) //如果目录不存在,则创建
    //     mkdir($upload_dir);
    // function makefilename(){ //根据上传时间生成上传文件名
    //     $current=getdate();
    //     $filename=$current['year'].$current['mon'].$current['mday'].$current['hours'].$current['minutes'].$current['seconds'].".jpg";
    //     return $filename;
    // }
    // $newfilname=makefilename();
    // $newfile=$upload_dir.$newfilname;

    include_once "../db_functions.php";

    $product_name = ppc($_POST["product_name"]);
    $tag = ppc($_POST["tag"]);
    $description = ppc($_POST["description"]);
    $price = (double)ppc($_POST["price"]);
    $id = 1;

    if ($product_name != "" && 
        $price > 0 &&
        file_exists($_FILES['upfile']['tmp_name'])) 
    {
        $fp = fopen($_FILES["upfile"]["tmp_name"],"r");
        $buf = addslashes(fread($fp,$_FILES["upfile"]["size"]));
        $conn = connectDB();
        $sql = "INSERT INTO Images(Image) VALUES ('$buf')";
        $success = $conn->query($sql);
        if ($success){
            $result=$conn->query("SELECT * FROM Images WHERE PicNum=1") or die("Cant Perform Query"); 
            $row = $result->fetch_object();
            header("Content-Type:image/jpeg");
            echo $row->Image;
        }else{
            echo 'Insert fail'.$conn->error;
        }
    }else{
        echo 'Wrong infomation';
    }
    // if(file_exists($_FILES['upfile']['tmp_name'])){
    //     // move_uploaded_file($_FILES['upfile']['tmp_name'],$newfile);
    //     echo "上传的文件信息：<br/>";
    //     echo "客户端文件名：".$_FILES['upfile']['name']."<br/>";
    //     echo "文件类型：".$_FILES['upfile']['type']."<br/>";
    //     echo "字节大小：".$_FILES['upfile']['size']."<br/>";
    //     // echo "上传后文件名：".$newfilname."<br/>"; //显示路径输出$newfile
    //     echo "文件上传成功".'<a href="JavaScript:history.back()">继续上传</a>';
    // }
    // else{
    //     echo "上传失败，错误类型".$_FILES['upfile']['error'];
    // }

?>