<?php

ini_set('display_errors', 'on');


require_once __DIR__ . '/../vendor/autoload.php';

$config = [
    'dir' => __DIR__ .'/../resource/',
    'class' => ['Api']
];
requireAllClass($config);

$doc = \jrient\phpDoc2Md\BuildMd::run($config);
echo "<textarea cols='100' rows='45'>$doc</textarea>";
exit();


//require_once __DIR__ . '/../vendor/autoload.php';
//require_once __DIR__ . '/Api.php'; // 加载测试API类1
//require_once __DIR__ . '/Api2.php'; // 加载测试API类2
//$config = [
//    'class'         => ['Api', 'Api2'], // 要生成文档的类
//    'filter_method' => ['__construct'], // 要过滤的方法名称
//];
//$api = new \jrient\phpDoc2md\BuildMd($config);
//$doc = $api->getHtml();
//exit($doc);

function requireAllClass($config)
{
    $dir = $config['dir'];
    try {
        $handler = opendir($dir);
        while (($filename = readdir($handler)) !== false) {
            if ($filename != "." && $filename != "..") {
                require_once $dir . $filename;
            }
        }
        closedir($handler);
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}