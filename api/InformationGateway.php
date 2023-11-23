<?php

class InformationGateway
{
    private PDO $conn;

    public function __construct(Database $config)
    {
        $this->conn = $config->connect();
    }

    public function create(array $data): int
    {
        $link = $data['link'];
        $comment = $data['comment'];
        $difficulty = $data['difficulty'];
        $responsible = $data['responsible'];

        $sql = "INSERT INTO information (link, comment, difficulty, responsible) ";
        $sql .= "VALUES (:link, :comment, :difficulty, :responsible)";

        $insert = $this->conn->prepare($sql);
        $insert->bindValue(":link", $link);
        $insert->bindValue(":comment", $comment);
        $insert->bindValue(":difficulty", $difficulty);
        $insert->bindValue(":responsible", $responsible);
        $insert->execute();

        $lastId = $this->conn->lastInsertId();
        return $lastId;
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM information";
        $select = $this->conn->prepare($sql);
        $select->execute();

        $req = $select->fetchAll(PDO::FETCH_ASSOC);

        return $req;
    }

    public function get(string $id): ?array
    {
        $sql = "SELECT * FROM information WHERE id = :id";
        $select = $this->conn->prepare($sql);
        $select->bindValue(":id", $id);
        $select->execute();

        $req = $select->fetch(PDO::FETCH_ASSOC);

        return $req ?: null;
    }

    public function update(array $req, array $data): int
    {
        $sql = "UPDATE information SET ";

        foreach ($data as $key => $value) {
            $sql .= "$key = :$key, ";
        }

        $sql = substr($sql, 0, -2);
        $sql .= " WHERE id = :id";

        $update = $this->conn->prepare($sql);

        foreach ($data as $key => $value) {
            $update->bindValue(":$key", $value);
        }

        $update->bindValue(":id", $req["id"]);

        $update->execute();

        return $update->rowCount();
    }

    public function delete(string $id): int
    {
        $sql = "DELETE FROM information WHERE id = :id";
        $delete = $this->conn->prepare($sql);
        $delete->bindValue(":id", $id);
        $delete->execute();

        return $delete->rowCount();
    }
}