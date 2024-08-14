<?php

require_once 'BDD/Database.php';

class LoginModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function authenticate($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        if (!$stmt) {
            die('Erreur de préparation de la requête : ' . $this->db->error);
        }

        $stmt->bind_param('s', $email);
        if (!$stmt->execute()) {
            die('Erreur d\'exécution de la requête : ' . $stmt->error);
        }

        $result = $stmt->get_result();
        if (!$result) {
            die('Erreur de récupération des résultats : ' . $this->db->error);
        }

        $user = $result->fetch_assoc();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false; // Invalid password
            }
        }

        return false; // User not found
    }
}
