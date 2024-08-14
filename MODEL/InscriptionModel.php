<?php

require_once 'BDD/Database.php';

class InscriptionModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function emailExists($email) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }
    

    public function insertInscription($firstname, $lastname, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $firstname, $lastname, $email, $hashed_password);
        return $stmt->execute();
    }
}

?>