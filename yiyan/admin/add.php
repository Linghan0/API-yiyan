<?php
//add.php
//提交一言

//连接数据库
$dbtable = 'yiyan_data'; //数据库表名
include_once ("../sql.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hitokoto = $_POST['hitokoto'];
    $type = $_POST['type'];
    $length = $_POST['length'];
    $from_where = $_POST['from_where'] ?? '';
    $from_who = $_POST['from_who'] ?? '';
    $commit_from = $_POST['commit_from'] ?? '';

    $sql = "INSERT INTO $dbtable (hitokoto, type, length, from_where, from_who, commit_from) VALUES ('$hitokoto', '$type', '$length', '$from_where', '$from_who', '$commit_from')";


    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('一言添加成功');</script>";
    } else {
        echo "<script>alert('一言添加失败: " . mysqli_error($conn) . "');</script>";
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>添加一言</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>    body {
    background: url(https://imgapi.cn/api.php?zd=pc&fl=fengjing&gs=images) no-repeat;
    background-size: cover;
    background-position: center 40px;
    min-height: 100vh;
    }

    @media (max-width: 768px) {
    body {
    background-image: url(https://imgapi.cn/api.php?zd=mobile&fl=fengjing&gs=images);
    background-size: cover;
    background-position: center 40px;
    }
    }</style>
</head>

<body>
    <?php include_once ("../navbar.php"); ?>

    <div class="container">
        <h2 style="text-align:center;">添加一言</h2>
        <form method="post" action="add.php">
            <table class="table">
                <tr>
                    <td><label for="hitokoto">一言内容:</label></td>
                    <td><textarea id="hitokoto" name="hitokoto" required class="form-control rounded-3"></textarea></td>
                </tr>
                <tr>
                    <td><label for="type">类型:</label></td>
                    <td><input type="text" id="type" name="type" required class="form-control rounded-3"></td>
                </tr>
                <tr>
                    <td><label for="from_where">来源:</label></td>
                    <td><input type="text" id="from_where" name="from_where" class="form-control rounded-3"></td>
                </tr>
                <tr>
                    <td><label for="from_who">作者:</label></td>
                    <td><input type="text" id="from_who" name="from_who" class="form-control rounded-3"></td>
                </tr>
                <tr>
                    <td><label for="commit_from">提交来源:</label></td>
                    <td><input type="text" id="commit_from" name="commit_from" class="form-control rounded-3"></td>
                </tr>
                <tr>
                    <td><label for="length">字数:</label></td>
                    <td><input type="number" id="length" name="length" required class="form-control rounded-3"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="提交" class="btn btn-primary rounded-3"></td>
                </tr>
            </table>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>