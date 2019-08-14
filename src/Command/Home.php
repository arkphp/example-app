<?php
namespace App\Command;

class Home extends Base {
    public function indexAction($params) {
        echo "Hello world!\n";
    }
}