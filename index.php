<?php

require_once __DIR__."/vendor/autoload.php";

$app = new \Core\App();

$app->setConfigPath("/config/config.php")
    ->setRouterPath("/config/routes.php");
$app->run();