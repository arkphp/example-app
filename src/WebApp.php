<?php
namespace App;

class WebApp extends \Ark\Framework\WebApp {
    public function __construct($configs) {
        parent::__construct($configs);
        $this->loadShortcut();

        require(__DIR__.'/http_route.php');

        foreach (include(__DIR__.'/service.php') as $name => $fn) {
            $this[$name] = $fn;
        }
    }
}