<?php
$process = new swoole_process(function (swoole_process $process) {
//    $process->write('Hello');
    echo "callback";
    var_dump($process);
}, false);

echo "111";
var_dump($process);
echo $process->start();
var_dump($process);
//usleep(100);
//
//echo $process->read(); // 输出 Hello