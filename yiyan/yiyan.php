<?php
//一言API接口

$dbtable = 'yiyan_data'; //数据库表名
include_once("sql.php");

//参数处理

$text = isset($_GET['text']) ? $_GET['text'] : '';//文本
$type = isset($_GET['type']) ? $_GET['type'] : '';//类型
$return_type = isset($_GET['r']) ? $_GET['r'] : 'text';//返回类型


// hitokoto
// type
// from_where
// from_who


//sql构造
if ($type == '' && $text == '') {
    $num = random_int(1, 6975); // 全部范围
    $sql = "select * from " . $dbtable . " where id=?;";
    $params = [$num];
} else {
    // SQL语句拼接优化
    $sql = "select * from " . $dbtable;
    $params = [];
    $whereAdded = false;

    if ($text != '') {
        $sql .= " where hitokoto like ?";
        $params[] = "%" . $text . "%";
        $whereAdded = true;
    }

    if ($type != '') {
        if ($whereAdded) {
            $sql .= " and type = ?";
        } else {
            $sql .= " where type = ?";
        }
        $params[] = $type;
    }

    $sql .= " order by rand() LIMIT 1;";
}

// 使用预处理语句
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    die('准备语句失败: ' . mysqli_error($conn));
}

// 绑定参数
if (!empty($params)) {
    $types = str_repeat('s', count($params));
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}

// 执行查询
if (!mysqli_stmt_execute($stmt)) {
    die('查询失败: ' . mysqli_error($conn));
}

$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (!$row) {
    die('没有找到匹配的记录');
}



//返回数据
if ($row) {
    if ($return_type == "json") {
        header('Content-Type: application/json');
        echo json_encode(['type' => 'ok', 'return' => $row]);
    } else {
        echo $row['hitokoto'];
    }
} else {
    if ($return_type == "json") {
        header('Content-Type: application/json');
        echo json_encode(['type' => 'error', 'return' => '没有找到匹配的数据']);
    } else {
        echo '没有找到匹配的数据';
    }
}


// 释放资源
mysqli_free_result($result);
mysqli_stmt_close($stmt);
mysqli_close($conn);

?>