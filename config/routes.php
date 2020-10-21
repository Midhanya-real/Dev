<?php

use \App\http\HomeController;

return [
    "/" => [HomeController::class, 'registration'],
    "/aut" => [HomeController::class, 'autorization']
];