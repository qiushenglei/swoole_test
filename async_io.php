<?php
    use Swoole\Async;
    Async::readFile(__DIR__."/tcp.php", function($a, $b){
        echo $a;
        echo $b;
    });

    echo "read end"; //先输出的end,代表了是异步打开了文件

    Async::writeFile(__DIR__."/write_test.php", "write test", "write_call_back", 1);

    function write_call_back($a, $b){
        echo "{$a} {$b}write success";
    }

    echo "write end";//在read end后输出，代表了异步写入文件
    sleep(3);
    echo "sleep end";