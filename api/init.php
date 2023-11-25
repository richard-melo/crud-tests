<?php

declare(strict_types=1);

require '../vendor/autoload.php';

spl_autoload_register(function ($class) {
    require __DIR__ . "$class.php";
});

header("Content-type: application/json; charset=UTF-8");

$parts = explode("/", $_SERVER["REQUEST_URI"]);
if ($parts[3] != "information") {
    http_response_code(404);
    exit;
}

$id = $parts[4] ?? null;

$database = new Database();

$gateway = new InformationGateway($database);

$controller = new InformationController($gateway);

$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
