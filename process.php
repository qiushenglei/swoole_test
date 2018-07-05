<?php
$server = new Swoole\Http\Server("127.0.0.1", 9502, SWOOLE_BASE);

$server->set([
    'worker_num' => 1,
    'task_worker_num' => 2,
]);

$server->on('Task', function (swoole_server $serv, $task_id, $worker_id, $data) {
    var_dump(func_get_args());
    echo "#{$serv->worker_id}\tonTask: worker_id={$worker_id}, task_id=$task_id\n";
    if ($serv->worker_id == 1) {
        sleep(1);
    }
    return $data;
});

$server->on('finish', function(){

});

$server->on('Request', function ($request, $response) use ($server)
{
    $tasks[0] = "hello world";
    $tasks[1] = ['data' => 1234, 'code' => 200];
    $tasks[2] = ['data' => 'sdfsdf', 'code' => 30];
    $result = $server->taskCo($tasks, 0.5);
    $response->end('Test End, Result: '.var_export($result, true));
});

$server->start();