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
                
        }
    }
}

?>