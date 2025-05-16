<script>
    // 显示元素
    function showElement(id) {
        document.getElementById(id).classList.remove('d-none');
        document.getElementById(id).classList.add('d-block');
    }
    // 隐藏元素
    function hideElement(id) {
        document.getElementById(id).classList.remove('d-block');
        document.getElementById(id).classList.add('d-none');
    }
</script>


<!-- 导航栏 -->
<nav class="navbar navbar-expand-sm bg-dark  navbar-fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/yiyan/index.html">logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/yiyan/index.html">主页</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/yiyan/yiyan.html">API</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/yiyan/search.php">查看</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/yiyan/admin/admin.php" id="admin">管理</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="post" action="/yiyan/search.php">
                <input class="form-control me-2" type="search" name="text" placeholder="指定关键词搜索一言" aria-label="Search">
                <button class="btn btn-outline-success d-flex align-items-center justify-content-center" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </form>
            <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                <li class="nav-item col-6 col-md-auto " id="login">
                    <a class="nav-link" href="/yiyan/login.php?action=login">登录</a>
                </li>
                <li class="nav-item col-6 col-md-auto " id="res">
                    <a class="nav-link" href="/yiyyan/login.php?action=res">注册</a>
                </li>
                <li class="nav-item dropdown " id="user-item">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php
                        if (isset($_COOKIE['user'])) {
                            echo htmlspecialchars($_COOKIE['user'], ENT_QUOTES, 'UTF-8');
                        } else {
                            echo "USER"; // 或者任何你希望显示的默认值
                        }
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/yiyan/user.php">个人中心</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/yiyan/login.php?action=logout">退出登录</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<?php
if (isset($_COOKIE['user'])) {
    echo "<script>hideElement('res');</script>";
    echo "<script>hideElement('login');</script>";
    echo "<script>showElement('user-item');</script>";
} else {
    echo "<script>showElement('login');</script>";
    echo "<script>showElement('res');</script>";
    echo "<script>hideElement('user-item');</script>";
}
if (isset($_COOKIE["token"])) {
    echo "<script>showElement('admin');</script>";
} else {
    echo "<script>hideElement('admin');</script>";
}
?>