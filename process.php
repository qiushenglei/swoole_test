<?php
$server = new swoole_server('127.0.0.1', 9501);

$process = new swoole_process(function($process) use ($server) {
    while (true) {
        $msg = $process->read();
        foreach($server->connections as $conn) {
            $server->send($conn, $msg);
        }
    }
});

$server->addProcess($process);

$server->on('receive', function ($serv, $fd, $from_id, $data) use ($process) {
    //群发收到的消息
    $process->write($data);
});

$server->start();