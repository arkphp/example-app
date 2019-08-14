<?php
$config = [
    'site' => [
        'name' => 'Arkphp',
    ],
];

$env = $_ENV['ENV'];
if (!$env) {
    $env = 'prod';
}

$envConfigFile = __DIR__.'/config.'.$env.'.php';
$envConfig = [];
if (file_exists($envConfigFile)) {
    $envConfig = include($envConfigFile);
}

return array_merge($config, $envConfig);