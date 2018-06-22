<?php
$serv = new swoole_server("127.0.0.1", 8888);
$serv->start();