<?php
// 获取并验证用户输入
$path = isset($_GET['path']) ? $_GET['path'] : '';
$path = urlencode($path);

// 验证输入，确保只包含合法字符
if (preg_match('/^[a-zA-Z0-9_\-\.\/\%]*$/', $path)) {
    // 合法的输入，继续处理
    $path = urldecode($path);
    $initialUrl = "https://onemanager-php--forevervideo.repl.co/$path";
    $userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36";
    $referer = "https://www.aliyundrive.com"; // 替换成你想要的 Referer 地址

    // 初始化 cURL 会话
    $ch = curl_init($initialUrl);

    // 设置 cURL 选项
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // 执行 cURL 请求
    $response = curl_exec($ch);

    // 检查是否有 Location 标头
    $redirectUrl = null;
    preg_match('/Location: (.+)/', $response, $matches);
    if (isset($matches[1])) {
        $redirectUrl = trim($matches[1]);
    }

    // 关闭 cURL 会话
    curl_close($ch);

    if (!empty($redirectUrl)) {
        // 在浏览器中打开跳转后的 URL
        header("Location: " . $redirectUrl);
        exit;
    } else {
        // 未发生跳转，你可以根据需要进行处理
        echo "Error";
    }
} else {
    // 非法输入，返回错误或采取其他安全措施
    echo "Invalid input";
}
?>
