<?php
    use Swoole\Async;
    swoole_async_read(__DIR__."/write_test.php", "read_call_back");
//    Async::readFile(__DIR__."/tcp.php", function($a, $b){
//
//        echo $a;
//        echo $b;
//    });

    echo "read end"; //先输出的end,代表了是异步打开了文件

//    Async::writeFile(__DIR__."/write_test.php", "write test", "write_call_back", 1);

    function write_call_back($a, $b){
        echo "{$a} {$b}write success";
    }

    function read_call_back($a, $b){
        echo "{$a} {$b}read success";
    }

    echo "write end";//在read end后输出，代表了异步写入文件
    $i = 0;
    while($i<10000000){
        $i++;
    }
    echo "sleep end";