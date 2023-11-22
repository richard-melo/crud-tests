<?php

class Config
{
    private $connectionConfig;
    private $PDO;

    public function __construct() {
        echo 2;
        $this->connectionConfig = ['HOST' => 'localhost','USER' => 'root', 'PASSWORD' => '', 'BASE' => 'information'];
    }

    public function connect(): PDO {
        $this->PDO = new PDO("mysql:host={$this->connectionConfig['HOST']};dbname={$this->connectionConfig['BASE']}", $this->connectionConfig['USER'], $this->connectionConfig['PASSWORD'], [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_STRINGIFY_FETCHES => false
        ]);
        return $this->PDO;
    }
}
