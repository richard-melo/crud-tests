<?php

declare(strict_types=1);

require './vendor/autoload.php';

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

header("Content-type: application/json; charset=UTF-8");

$database = new Database();

$gateway = new InformationGateway($database);

$controller = new InformationController($gateway);

$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
