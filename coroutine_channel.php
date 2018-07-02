<?php
echo 1111;
$b = "1111";
go(function () {
    $client = new Swoole\Coroutine\Client(SWOOLE_SOCK_TCP);
    echo 222;
    echo $b = "aaaa";
//    if (!$client->connect('127.0.0.1', 9501, 0.5)) {
//        exit("connect failed. Error: {$client->errCode}\n");
//    }
//    $client->send("hello world\n");
//    echo $client->recv();
//    $client->close();
});
echo $b;
echo 3333;
