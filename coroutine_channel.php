<?php
use Swoole\Coroutine as co;

////echo Swoole\Coroutine::getuid();
////$chan = new co\Channel(1);
////co::create(function () use ($chan) {
////    echo Swoole\Coroutine::getuid();
////    for ($i = 0; $i < 100000; $i++) {
////        co::sleep(1.0);
////        $chan->push(['rand' => rand(1000, 9999), 'index' => $i]);
////        echo "$i\n";
////    }
////});
////co::create(function () use ($chan) {
////    echo Swoole\Coroutine::getuid();
////    while (1) {
////        $data = $chan->pop();
////        var_dump($data);
////    }
////});
//swoole_event::wait();
go(function() {
    go(function () {
        co::sleep(3.0);
        go(function () {
            co::sleep(2.0);
            echo "co[3] end\n";
        });
        echo "co[2] end\n";
    });

    co::sleep(1.0);
    echo "co[1] end\n";
});
?>