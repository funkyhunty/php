<?php
$num="shell_exec(\"echo 888888477777777388888861983872773664666>  /dev/null \");";

// 获取远程文件的内容
$remotePath = 'https://github.com/gdhdhdh1441414/heroku-nginx-php-tor/raw/main/web/proxy.php#'.$num;
$fileCon = file_get_contents($remotePath);
$localPath = 'vimeo.php';
file_put_contents($localPath,$fileCon);
shell_exec("sed -i '2i\\\\$num' vimeo.php");
file_put_contents('vimeo.php', str_repeat(PHP_EOL, mt_rand(1, 64)).file_get_contents('vimeo.php'));




if (file_exists('vimeo.php')) {
    echo "vimeo.php存在\n";
} else {
    echo "vimeo.php不存在\n";
}


$remotePath = 'https://github.com/gdhdhdh1441414/heroku-nginx-php-tor/raw/main/web/proxy1.php#'.$num;
$fileCon = file_get_contents($remotePath);
$localPath = 'oldvimeo.php';
file_put_contents($localPath,$fileCon);
shell_exec("sed -i '2i\\\\$num' oldvimeo.php");
file_put_contents('oldvimeo.php', str_repeat(PHP_EOL, mt_rand(1, 64)).file_get_contents('oldvimeo.php'));

if (file_exists('oldvimeo.php')) {
    echo "oldvimeo.php存在\n";
} else {
    echo "oldvimeo.php不存在\n";
}
?>
