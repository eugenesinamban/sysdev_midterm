<?php
require_once(__DIR__ . '/Db.php');

class MessageRepository {
    private $table_name = 'message_board';
    private $dbh = null;

    public function __construct() {
        $this->dbh = Db::getHandle();
    }

    public function insert_message($title, $message, $image_filename) {
        $query = "INSERT INTO " . $this->table_name . " (title, message, image_filename) VALUES (:title, :message, :image_filename);";
        try {
            $sth = $this->dbh->prepare($query);
            $result = $sth->execute([
                ':title' => $title,
                ':message' => $message,
                ':image_filename' => $image_filename,
            ]);
            return $result;
        } catch(\PDOException $e) {
            return $e;
        }
    }

    public function fetch_messages() {
        $query = "SELECT * FROM " . $this->table_name . ";";
        $sth = $this->dbh->prepare($query);
        $sth->execute();
        return $sth->fetchAll();
    }
    
}
