<?php
$serv = new swoole_server("127.0.0.1", 9501);

//设置异步任务的工作进程数量
$serv->set(array('task_worker_num' => 4));

$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    //投递异步任务
    $task_id = $serv->task($data);  //异步，task添加成功直接返回task_id，不要等待处理任务结果
    echo "Dispath AsyncTask: id=$task_id\n";
    var_dump($serv->stats());   //tasking_num代表正在排队数(待worker执行的任务)，什么时候会增加到2，当所有worker都在执行操作，并且没有释放(worker还在执行中),当在加入一个任务，tasking_num就会增加，在onTask加入死循环，就可以实现操作
    $serv->send($fd, "addTask success");
});

//处理异步任务
$serv->on('task', function ($serv, $task_id, $from_id, $data) {
    echo "New AsyncTask[id=$task_id]" . PHP_EOL;
//    while(1){}
    //返回任务执行的结果
    $serv->finish("$data -> OK");
});

//处理异步任务的结果
$serv->on('finish', function ($serv, $task_id, $data) {

    echo "AsyncTask[$task_id] Finish: $data" . PHP_EOL;
    var_dump($serv->stats());
});

$serv->start();