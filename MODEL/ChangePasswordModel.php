<?php

require_once 'BDD/Database.php';

class ChangePasswordModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function checkCurrentPassword($email, $current_password) {
        $stmt = $this->db->prepare("SELECT password FROM users WHERE email = ?");
        if (!$stmt) {
            die('Erreur de préparation de la requête : ' . $this->db->error);
        }

        $stmt->bind_param('s', $email);
        if (!$stmt->execute()) {
            die('Erreur d\'exécution de la requête : ' . $stmt->error);
        }

        
        $hashed_password = '';
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        $stmt->close();

        // débogage
        error_log("Current password input: " . $current_password);
        error_log("Hashed password from DB: " . $hashed_password);
        $isPasswordCorrect = password_verify($current_password, $hashed_password);
        error_log("Password verification result: " . ($isPasswordCorrect ? 'true' : 'false'));

        return $isPasswordCorrect;
    }

    public function updatePassword($email, $new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE users SET password = ? WHERE email = ?");
        if (!$stmt) {
            die('Erreur de préparation de la requête : ' . $this->db->error);
        }

        $stmt->bind_param('ss', $hashed_password, $email);
        if (!$stmt->execute()) {
            die('Erreur d\'exécution de la requête : ' . $stmt->error);
        }

        $stmt->close();
        return true;
    }
}
