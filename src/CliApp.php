<?php
namespace App;

class CliApp extends \Ark\Framework\BaseApp {
    public function __construct($configs) {
        parent::__construct($configs);
        $this->loadShortcut();

        require(__DIR__.'/cli_route.php');

        foreach (include(__DIR__.'/service.php') as $name => $fn) {
            $this[$name] = $fn;
        }
    }

    public function onDispatch($app) {
        cliDispatch();
    }
}