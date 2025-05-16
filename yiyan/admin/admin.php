<?php
$dbtable = 'yiyan_data'; //数据库表名
include_once("../sql.php");

$_POST['text'] = isset($_POST['text'])? $_POST['text'] : '';
$_POST['yiyan_type'] = isset($_POST['yiyan_type'])? $_POST['yiyan_type'] : '';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM " . "$dbtable" . " ORDER BY ID ASC LIMIT $limit OFFSET $offset";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$num = mysqli_num_rows($result);//获取记录集的条目数,保存在变量$num中

$total_sql = "SELECT COUNT(*) AS total FROM " . "$dbtable";
$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total_pages = ceil($total_row['total'] / $limit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include_once("../navbar.php");?>

    <div class="container mt-5">
        <h1>一言句子管理</h1>
        <div class="d-flex justify-content-center">
            <form class="d-flex" role="search" method="post" action="/admin/admin.php">
                <input class="form-control me-2" type="search" placeholder="指定关键词搜索一言" aria-label="Search" name="text">
                <select class="form-select me-2" aria-label="Select category" name="yiyan_type">
                    <option value="z">全选</option>
                    <option value="a">动画</option>
                    <option value="b">漫画</option>
                    <option value="c">游戏</option>
                    <option value="d">文学</option>
                    <option value="e">原创</option>
                    <option value="f">来自网络</option>
                    <option value="g">其他</option>
                    <option value="h">影视</option>
                    <option value="i">诗词</option>
                    <option value="j">网易云</option>
                    <option value="k">哲学</option>
                    <option value="l">抖机灵</option>
                </select>
                <button class="btn btn-outline-success d-flex align-items-center justify-content-center" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><span>ID</span><br><span>id</span></th>
                    <th><span>句子</span><br><span>hitokoto</span></th>
                    <th><span>类型</span><br><span>type</span></th>
                    <th><span>来自</span><br><span>from_where</span></th>
                    <th><span>作者</span><br><span>from_who</span></th>
                    <th><span>来源</span><br><span>commit_from</span></th>
                    <th><span>字数</span><br><span>length</span></th>
                    <th><span>操作</span><br><span>Action</span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($num > 0){
                        for ($i=1; $i<=$num; $i++){//循环输出每条记录
                            $info = mysqli_fetch_array($result, MYSQLI_BOTH);//获取一条记录
                
                ?>
                <tr>
                    <td><?= $info['id']; ?></td>
                    <td><?= $info['hitokoto']; ?></td>
                    <td><?= $info['type']; ?></td>
                    <td><?= $info['from_where']; ?></td>
                    <td><?= $info['from_who']; ?></td>
                    <td><?= $info['commit_from']; ?></td>
                    <td><?= $info['length']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $info['id']; ?>" class="btn btn-primary">编辑</a>
                        <a href="delete.php?id=<?= $info['id']; ?>" class="btn btn-danger">删除</a>
                    </td>
                </tr>
                <?php
                }}
                ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <form action="/admin/admin.php" method="get">
                    <div class="input-group">
                        <input type="number" class="form-control" name="page" min="1" max="<?= $total_pages ?>" value="<?= $page ?>">
                        <button class="btn btn-outline-secondary" type="submit">跳转</button>
                    </div>
                </form>
                <span>页数: <?= $page ?> / <?= $total_pages ?></span>
            </div>
            <a href="add.php" class="btn btn-success">新增句子</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>