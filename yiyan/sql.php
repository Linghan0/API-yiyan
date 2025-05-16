<?php
// 加载项目目录内的.env文件
$env_path = __DIR__.'/.env';
if (file_exists($env_path)) {
    $env = parse_ini_file($env_path);
    foreach ($env as $key => $value) {
        putenv("$key=$value");
    }
} else {
    // 如果不存在，尝试加载上级目录的.env（兼容旧配置）
    $env_path = dirname(__DIR__).'/.env';
    if (file_exists($env_path)) {
        $env = parse_ini_file($env_path);
        foreach ($env as $key => $value) {
            putenv("$key=$value");
        }
    }
}

// 配置设置（环境变量优先，不存在时使用默认值）
$config = [
    'host' => getenv('DB_HOST') ?: 'localhost',
    'user' => getenv('DB_USER') ?: 'db_username',
    'name' => getenv('DB_NAME') ?: 'db_name',
    'pass' => getenv('DB_PASS') ?: 'db_password',
    'table' => empty($dbtable) ? (getenv('DB_TABLE') ?: 'user') : $dbtable
];

// 建立数据库连接
try {
    $conn = mysqli_connect($config['host'], $config['user'], $config['pass']);
    if (!$conn) {
        throw new Exception("数据库连接失败: ".mysqli_connect_error());
    }

    // 选择数据库
    if (!mysqli_select_db($conn, $config['name'])) {
        throw new Exception("数据库选择失败: ".mysqli_error($conn));
    }

    // 设置表名
    $dbtable = $config['table'];
    
} catch (Exception $e) {
    die("数据库错误: ".$e->getMessage()."\n当前使用配置: ".json_encode($config, JSON_UNESCAPED_UNICODE));
}