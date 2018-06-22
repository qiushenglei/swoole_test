<?php
    Swoole\Async::readFile(__DIR__."/tcp.php", function($a, $b){
        echo $a;
        echo $b;
    });

    echo "end";
