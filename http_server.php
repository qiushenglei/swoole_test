<?php
$http = new swoole_http_server("0.0.0.0", 9501);

$http->on("request", function ($request, $response) {
    $client = new Swoole\Coroutine\Client(SWOOLE_SOCK_TCP);
    $client->connect("127.0.0.1", 8888, 0.5);
//    var_dump($client->getuid());
    //调用connect将触发协程切换
    $client->send("hello world from swoole");
    //调用recv将触发协程切换
//    var_dump($client->getuid());
    $ret = $client->recv();
    $response->header("Content-Type", "text/plain");
    $response->end($ret);
    $client->close();
});

$http->start();
?>