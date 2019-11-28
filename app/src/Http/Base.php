<?php
namespace App\Http;
class Base {
    protected $engine;
    protected function json($data, $status=null) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    protected function render($tpl, $variables = [], $status = null) {
        echo service('template')->render($tpl, $variables);
    }
}