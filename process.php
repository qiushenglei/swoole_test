<?php
$process = new swoole_process(function (swoole_process $process) {
    $process->write('Hello');
    echo "callback";
    var_dump($process);
}, true);

echo "111";
var_dump($process);
//$process->start();
//usleep(100);
//
//echo $process->read(); // 输出 Hello