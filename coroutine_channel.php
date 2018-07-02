<?php
use Swoole\Coroutine as co;
$chan = new co\Channel(1);
co::create(function () use ($chan) {
    for($i = 0; $i < 100000; $i++) {
        co::sleep(2.0);
        $chan->push(['rand' => rand(1000, 9999), 'index' => $i]);
        echo "$i\n";
    }
});
co::create(function () use ($chan) {
    while(1) {
        $data = $chan->pop();
        var_dump($data);
    }
});
co::create(function () use ($chan) {
    echo "third coroutine";
});
swoole_event::wait();
