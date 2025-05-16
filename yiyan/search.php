<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['text'];
    $yiyan_type = $_POST['yiyan_type'];

    // 这里可以添加处理输入的逻辑
    echo "你输入的文本是: " . htmlspecialchars($text) . "<br>";
    echo "你选择的类型是: " . htmlspecialchars($yiyan_type) . "<br>";
}
?>