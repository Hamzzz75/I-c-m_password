<?php

require_once 'BDD/Database.php';

$db = Database::getInstance()->getConnection();


$result = $db->query("SELECT id, password FROM users WHERE password NOT LIKE '$2y$%'");

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $password = $row['password'];

    // Hacher le mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Mettre à jour le mot de passe haché dans la base de données
    $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->bind_param('si', $hashed_password, $id);
    $stmt->execute();

    
    echo "User ID: $id - Original Password: $password - Hashed Password: $hashed_password<br>";
}

echo "Tous les mots de passe non hachés ont été mis à jour.";

?>
