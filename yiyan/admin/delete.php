<?php
//delete.php?id=#

//连接数据库
$dbtable = 'yiyan_data'; //数据库表名
include_once ("../sql.php");

//验证身份
if (! isset($_COOKIE['token']))  {
    echo "<script>alert('你不是管理员');location.href='login.php';</script>";
    exit;

    //验证token
    //
}

//获取id
    $id = $_GET['id'];

//删除数据  
    $sql = "DELETE FROM ". $dbtable ." WHERE id=$id";
    $result = mysqli_query($conn, $sql);

//判断是否删除成功
    if ($result) {
        echo "<script>alert('删除成功');</script>";
    } else {
        echo "<script>alert('删除失败');</script>";
    }

mysqli_close($conn);
?>