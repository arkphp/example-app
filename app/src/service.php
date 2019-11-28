<?php
return [
    'template' => function() {
        return new \Ark\Template\Engine(ROOT.'/view');
    },
    'log' => function() {
        $log = new Monolog\Logger('app');
        $log->pushHandler(new Monolog\Handler\RotatingFileHandler('/data/log/app.log', 10, Monolog\Logger::DEBUG));

        return $log;
    }
];