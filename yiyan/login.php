<?php
header("Content-Type: text/html; charset=utf8");

$dbtable = 'user'; //数据库表名
include_once("sql.php");

switch ($_GET['action']) {
    case 'res':
        if (!empty($_POST)) {
            $user = $_POST['user'];
            $pass = md5($_POST['pass']);

            if (empty($user) || empty($pass)) {
                echo "<script>alert('用户名或密码不能为空！');history.back;</script>";
            }

            $sql = "select * from " . $dbtable . " where username='$user';";
            $result = mysqli_query($conn, $sql);
            if ($result === false) {
                die("数据库查询失败: " . mysqli_error($conn));
            }
            $row = mysqli_fetch_array($result);

            //判断用户名是否已存在
            if (!empty($row)) {
                echo "<script >window.alert('已存在该用户！');window.history.back();</script>";
            } else {
                $sql = "insert into " . $dbtable . "(username,password) values('$user','$pass');";
                $result = mysqli_query($conn, $sql);
                echo "<script'>window.alert('注册成功！');window.location.href='login.php?action=login';</script>";
            }
            mysqli_close($conn); //关闭数据库
        }
        break;

    case 'login':
        if (!empty($_POST)) {
            $user = $_POST['user'];
            $pass = md5($_POST['pass']);
            if (empty($user) || empty($pass)) {
                echo "<script>alert('用户名或密码不能为空！');history.back;</script>";
            }

            $sql = "select * from " . $dbtable . " where username='$user';";
            $result = mysqli_query($conn, $sql);
            if ($result === false) {
                die("数据库查询失败: " . mysqli_error($conn));
            }
            $row = mysqli_fetch_array($result);

            if (empty($row)) {
                echo "<script >window.alert('账号不存在！');window.history.back();</script>";
            }
            if ($row['password'] != $pass) {
                echo "<script >window.alert('密码错误！');window.history.back();</script>";
            } else {
                if ($row['op'] ){
                    setcookie('op', 1, time() + 3600 * 24);
                    setcookie('token', $row['token'], time() + 3600 * 24);
                }
                setcookie('id', $row['id'], time() + 3600 * 24);
                setcookie('user', $row['username'], time() + 3600 * 24);
                echo "<script>window.alert('登录成功！');window.location.href='index.html';</script>";
            }
        }
        break;
    case 'logout':
        setcookie('id', '');
        setcookie('user', '');
        echo '<script>window.location.href="index.php"</script>';
        break;
}
?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <title>登录、注册页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        .box {
            width: 480px;
            min-height: 100px;

            margin: 100px auto 0 auto;
            border: 1px solid #dddddd;
            padding: 20px 20px 20px 20px;
        }

        .box h2 {
            text-align: center;
        }
    </style>

    <script>
        function setFormAction(action) {
            document.querySelector('form').action = action;
        }
    </script>

</head>

<body>

    <!-- 登录页面 -->
    <div class="box">
        <form method="post" action="">
            <h2>登录/注册</h2>
            <div class="mb-3">
                <label for="user" class="form-label">用户名</label>
                <input type="text" class="form-control" id="user" name="user" placeholder="请输入用户名">

            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">密码</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="请输入密码">
            </div>
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->

            <div class="text-center">
                <button type="button" class="btn btn-primary" onclick="setFormAction('login.php?action=login');form.submit();">登录</button>
                <button type="button" class="btn btn-secondary" onclick="setFormAction('login.php?action=res');form.submit();">注册</button>
            </div>
        </form>
    </div>
    <!-- <div class="footer">
        <p>
            <?php echo $SettingInfo['copyright']; ?>
        </p>
    </div> -->

    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>