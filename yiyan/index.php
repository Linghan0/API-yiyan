<!doctype html>
<html lang="zh-cn">

<head>
    <title>一言主页</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="bs5.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* 背景 */
        body {
            background: url(https://imgapi.cn/api.php?zd=pc&fl=dongman&gs=images) no-repeat;
            background-size: cover;
            background-position: center 40px;
            min-height: 100vh;
        }

        @media (max-width: 768px) {
            body {
                background-image: url(https://imgapi.cn/api.php?zd=mobile&fl=dongman&gs=images);
                background-size: cover;
                background-position: center 40px;
            }
        }

        hitokoto_text {
            color: white;
            font-size: 4em;
            text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
        }
    </style>
</head>

<body>

    <?php include_once("navbar.php");?>

    <div class="d-flex flex-column vh-100">
        <div class="d-flex align-items-center justify-content-center flex-grow-1">
            <div class="container row justify-content-center rounded-3 bg-light bg-opacity-50 text-center">
                <h2 class="fs-3">简介</h2>

                <ul class="list-unstyled fs-4">
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        动漫也好、小说也好、网络也好，不论在哪里，我们总会看到有那么一两个句子能穿透你的心。我们把这些句子汇聚起来，形成一言网络，以传递更多的感动。
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        简单来说，一言指的就是一句话，可以是动漫中的台词，也可以是网络上的各种小段子。 或是感动，或是开心，有或是单纯的回忆。
                    </li>
                </ul>
            </div>
        </div>

        <!-- 随机一言 -->
        <div class="d-flex align-items-center justify-content-center flex-grow-1 ">
            <div class="container row justify-content-center rounded-3 bg-light bg-opacity-50">

                <p id="hitokoto" class="fs-1 text-center">
                    <a href="https://hitokoto.cn/" id="hitokoto_text" style="color: inherit;">:D 获取中...</a>
                </p>

            </div>
        </div>
    </div>


    <!-- yiyan script -->
    <script>
        fetch('https://v1.hitokoto.cn')
            .then(response => response.json())
            .then(data => {
                const hitokoto = document.querySelector('#hitokoto_text')
                hitokoto.href = `https://hitokoto.cn/?uuid=${data.uuid}`
                hitokoto.innerText = data.hitokoto
            })
            .catch(console.error)
    </script>


    <!-- Bootstrap js -->
    <!-- <script src="bs5.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>