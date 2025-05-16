<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户资料页</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php';?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://imgapi.cn/qq.php?qq=2960162512" class="img-fluid rounded-start" alt="..." style="max-width: 200px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">user：
                                    <?=$_COOKIE['user'];?>
                                </h5>
                                <h6>id:
                                    <?=$_COOKIE['id'];?>
                                </h6>
                                <p class="card-text">用户简介：这个人很懒？嗯？</p>
                                <p class="card-text"><small class="text-muted">~2024.7.3</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">个人资料</h5>
                    </div>
    
                    <div class="card-body">
    
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">邮箱: user@example.com</li>
                            <li class="list-group-item">电话: 123-456-7890</li>
                            <li class="list-group-item">地址: 某市某区某街道</li>
                            <li class="list-group-item">敬请期待！</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>