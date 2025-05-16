<?php
// Load API base URL from environment
$api_base_url = getenv('API_BASE_URL');
if (empty($api_base_url)) {
    die('API base URL is not configured. Please check your .env file');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include_once("navbar.php");?>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active fs-4 text-dark-gray" href="#request-address"
                                style="margin-left: 20px; margin-top: 20px; margin-bottom: 20px;">请求地址</a>
                        </li>
                    </ul>
                    <hr>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link fs-4 text-dark-gray" href="#optional-parameters"
                                style="margin-left: 20px; margin-top: 20px; margin-bottom: 20px;">可选参数</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-4 text-dark-gray" href="#sentence-types"
                                style="margin-left: 20px; margin-top: 20px; margin-bottom: 20px;">句子类型</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-4 text-dark-gray" href="#return-codes"
                                style="margin-left: 20px; margin-top: 20px; margin-bottom: 20px;">返回编码</a>
                        </li>
                    </ul>
                    <hr>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link fs-4 text-dark-gray" href="#request-example"
                                style="margin-left: 20px; margin-top: 20px; margin-bottom: 20px;">请求示例</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-4 text-dark-gray" href="#return-example"
                                style="margin-left: 20px; margin-top: 20px; margin-bottom: 20px;">返回示例</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2" id="request-address">请求地址</h1>
                </div>
                <p><?= $api_base_url ?>/yiyan/yiyan.php</p>


                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2" id="optional-parameters">可选参数</h1>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>参数</th>
                            <th>说明</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>text</td>
                            <td>内容</td>
                        </tr>
                        <tr>
                            <td>type</td>
                            <td>句子类型</td>
                        </tr>
                        <tr>
                            <td>format</td>
                            <td>返回编码</td>
                        </tr>
                    </tbody>
                </table>

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2" id="sentence-types">句子类型</h1>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>类型</th>
                            <th>说明</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>a</td>
                            <td>动画</td>
                        </tr>
                        <tr>
                            <td>b</td>
                            <td>漫画</td>
                        </tr>
                        <tr>
                            <td>c</td>
                            <td>游戏</td>
                        </tr>
                        <tr>
                            <td>d</td>
                            <td>文学</td>
                        </tr>
                        <tr>
                            <td>e</td>
                            <td>原创</td>
                        </tr>
                        <tr>
                            <td>f</td>
                            <td>来自网络</td>
                        </tr>
                        <tr>
                            <td>g</td>
                            <td>其他</td>
                        </tr>
                        <tr>
                            <td>h</td>
                            <td>影视</td>
                        </tr>
                        <tr>
                            <td>i</td>
                            <td>诗词</td>
                        </tr>
                        <tr>
                            <td>j</td>
                            <td>网易云</td>
                        </tr>
                        <tr>
                            <td>k</td>
                            <td>哲学</td>
                        </tr>
                        <tr>
                            <td>l</td>
                            <td>抖机灵</td>
                        </tr>
                    </tbody>
                </table>

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2" id="return-codes">返回编码</h1>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>编码</th>
                            <th>说明</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>json</td>
                            <td>返回json格式数据</td>
                        </tr>
                        <tr>
                            <td>text</td>
                            <td>返回纯文本数据</td>
                        </tr>
                    </tbody>
                </table>

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2" id="request-example">请求示例</h1>
                </div>
                <p>GET <?= $api_base_url ?>/yiyan/yiyan.php?text=爱&type=a&r=json</p>

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2" id="return-example">返回示例</h1>
                </div>
                <pre>
{
"type": "ok",
"return": {
"id": 3078,
"uuid": "cc2b77b1-9ea2-46c2-8b96-1dee6e8ebe96",
"hitokoto":
"\u5927\u5bb6\u70ed\u7231\u7684\u4e8b\u7269\uff0c\u64c5\u957f\u7684\u4e8b\u7269\u90fd\u4e0d\u540c\uff0c\u90fd\u62e5\u6709\u81ea\u5df1\u7684\u4e16\u754c\uff0c\u4e00\u4e2a\u4eba\u4e00\u4e2a\u4e16\u754c\uff0c\u8fd9\u4e9b\u4e92\u76f8\u8fde\u63a5\u7684\u8bdd\uff0c\u5c31\u4f1a\u5c55\u5f00\u8bb8\u591a\u7684\u53ef\u80fd\u6027\uff0c\u5e7f\u5927\u3001\u672a\u77e5\uff0c\u5c31\u50cf\u662f\u5b87\u5b99\u4e00\u6837\u3002",
"type": "a",
"from_where": "\u604b\u7231\u5c0f\u884c\u661f",
"from_who": "\u6728\u4e4b\u5e61\u7c73\u62c9",
"creator": "yuuna",
"creator_uid": 5606,
"reviewer": 4756,
"commit_from": "web",
"created_at": 1585356147,
"length": 68
}
}
                </pre>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>