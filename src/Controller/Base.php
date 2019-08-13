<?php
namespace App\Controller;
use Ark\Template\Engine;
class Base {
    protected $engine;
    public function __construct() {
        $this->engine = new Engine(__DIR__.'/../../view');
    }
    protected function json($data, $status=null) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    protected function render($tpl, $variables = [], $status = null) {
        echo $this->engine->render($tpl, $variables);
    }
}