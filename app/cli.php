<?php
require(__DIR__.'/src/bootstrap.php');
$config = include(ROOT.'/config/config.php');
(new App\CliApp($config))->run();