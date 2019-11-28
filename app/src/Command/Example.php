<?php
namespace App\Command;

class Example extends Base {
    public function testAction() {
        service('log')->addInfo('hello');
        echo "Hello\n";
    }

    public function keepAction() {
        while (true) {
            echo date('Y-m-d H:i:s');
            sleep(3);
        }
    }
}