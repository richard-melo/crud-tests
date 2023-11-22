<?php

require_once 'config.php';

$action = $_POST['action'];
$save = new Save();

if (!method_exists($save, $action)) {
    
}

class Save
{

    private $link;
    private $comment;
    private $difficulty;
    private $responsible;
    private $db;

    public function __construct() {
        $this->db = new Config();
        $this->db->connect();
        echo '1';
    }

    public function save(){
        if ($_REQUEST('action') == 'save') {
                $link = $_POST['link'];
                $comment = $_POST['comment'];
                $difficulty = $_POST['difficulty'];
                $responsible = $_POST['responsible'];
                
                $sql = "INSERT INTO information (link, comment, difficulty, responsible)";
                $sql .= "VALUES ('{$link}', '{$comment}', {$difficulty}, '{$responsible}')";
                
                $insert = $this->db->query($sql);

                echo (json_encode($insert));
                return;
        }
    }
}

?>