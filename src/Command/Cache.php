<?php
namespace App\Command;

class Cache extends Base {
    public function clearAction($params) {
        echo "Cache cleared\n";
    }
}