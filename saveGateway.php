<?php

class SaveGateway
{
    private PDO $conn;

    public function __construct(Config $config) {
        $this->conn = $config->connect();
    }


    public function save()
    {
        $link = $_POST['link'];
        $comment = $_POST['comment'];
        $difficulty = $_POST['difficulty'];
        $responsible = $_POST['responsible'];
        
        $sql = "INSERT INTO information (link, comment, difficulty, responsible)";
        $sql .= "VALUES ('{$link}', '{$comment}', {$difficulty}, '{$responsible}')";
        
        $insert = $this->conn->prepare($sql);
        $insert->execute();

        $lastId = $this->conn->lastInsertId();
        return $lastId;
    }
}