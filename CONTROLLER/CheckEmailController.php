<?php
require_once '../BDD/Database.php';
require_once '../MODEL/InscriptionModel.php';

header('Content-Type: application/json'); // Indiquer que la réponse est du JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    // Validation de l'email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $inscriptionModel = new InscriptionModel();

        if ($inscriptionModel->emailExists($email)) {
            echo json_encode(['status' => 'error', 'message' => 'L\'adresse email est déjà utilisée.']);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'L\'adresse email est disponible.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Adresse email non valide.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Requête non valide.']);
}
?>
