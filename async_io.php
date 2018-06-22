<?php
    use Swoole\Async;
   Async::readFile(__DIR__."/tcp.php", function($a, $b){
        echo $a;
        echo $b;
    });

    echo "end"; //先输出的end,代表了是异步打开了文件
