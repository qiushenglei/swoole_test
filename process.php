<?php
use Swoole\Process;
$process = new Process(function (Process $worker) {
    $worker->exec('/usr/local/php/bin/php', ['/home/work/swoole_project/echo.php','3','sdfs','5']);
    $worker->write('hello');
}, false); // 需要启用标准输入输出重定向
$process->start();
echo "from exec: ". $process->read(). "\n";