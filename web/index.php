<?php

require_once("autoload.php"); // автозагрузка классов

$localConfig = require(__DIR__ . '/../application/config/web-local.php');
// var_dump ($localConfig);  
$config = ItForFree\rusphp\PHP\ArrayLib\Merger::mergeRecursivelyWithReplace(
    require(__DIR__ . '/../application/config/web.php'), 
    $localConfig);
// var_dump ($localConfig); die();


\ItForFree\SimpleMVC\Application::get()
    ->setConfiguration($config)
    ->run();
