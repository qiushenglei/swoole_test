<?php
$http = new swoole_http_server("127.0.0.1", 9501);

$http->on("request", function ($request, $response) {
    $client = new Swoole\Coroutine\Client(SWOOLE_SOCK_TCP);
    $client->connect("127.0.0.1", 8888, 0.5);
    //调用connect将触发协程切换
    $client->send("hello world from swoole");
    //调用recv将触发协程切换
    var_dump( microtime(true)); //send和recv中间插入业务代码，相当于非阻塞。当需要到，异步的代码result时，再client->recv
    echo "recv after";
    $ret = $client->recv();
    echo "recv after";
    var_dump( microtime(true));
    $response->header("Content-Type", "text/plain");
    $response->end($ret);
    $client->close();
});

$http->start();
?>