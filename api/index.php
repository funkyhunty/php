<meta name="referrer" content="never">
<?php
echo "10086";
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

    $curlCmd = 'curl -A "' . $userAgent . '" -e "' . $referer . '" -I -L "' . $initialUrl . '"';
    $headers = shell_exec($curlCmd);

    if (strpos($headers, "Location:") !== false) {
        // 从HTTP标头中提取跳转后的URL
        preg_match('/Location: (.+)/', $headers, $matches);
        $redirectUrl = trim($matches[1]);
      //  echo '<a href="' . $redirectUrl . '"> Click</a>';
       // exit;

        // 在浏览器中打开跳转后的URL
        header("Location: " . $redirectUrl);
        exit;
    } else {
        // 未发生跳转，你可以根据需要进行处理
        echo "Error" ;
    }
} else {
    // 非法输入，返回错误或采取其他安全措施
    echo "Invalid input";
}
?>
