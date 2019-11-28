<?php
define('ROOT', __DIR__.'/..');
require(ROOT.'/vendor/autoload.php');
$dotenv = Dotenv\Dotenv::create(ROOT);
$dotenv->load();