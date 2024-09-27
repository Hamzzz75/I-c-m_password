<?php

require_once 'MODEL/InscriptionModel.php';
require_once 'CONTROLLER/ConfirmationController.php';

class InscriptionController {
    private $model;

    public function __construct() {
        $this->model = new InscriptionModel();
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
            $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

            // Validation des champs
            if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password)) {
                $this->redirectWithMessage('Tous les champs doivent être remplis.', 'error');
                return;
            }

            if ($password !== $confirm_password) {
                $this->redirectWithMessage('Les mots de passe ne correspondent pas.', 'error');
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->redirectWithMessage("L'adresse email n'est pas valide.", 'error');
                return;
            }

            if ($this->model->emailExists($email)) {
                $this->redirectWithMessage("L'adresse email est déjà utilisée.", 'error');
                return;
            }

            // Validation du mot de passe
            $password_regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
            if (!preg_match($password_regex, $password)) {
                $this->redirectWithMessage('Le mot de passe ne répond pas aux critères de sécurité.', 'error');
                return;
            }

            // Inserer les données dans la base de données
            $result = $this->model->insertInscription($firstname, $lastname, $email, $password);
            if ($result) {
                $this->showConfirmation();
            } else {
                $this->redirectWithMessage('Erreur lors de l\'inscription.', 'error');
            }
        }
    }

    private function redirectWithMessage($message, $type) {
        header("Location: /FormulaireInscription/index.php?action=inscription&message=" . urlencode($message) . "&type=" . $type);
        exit();
    }

    private function showConfirmation() {
        header("Location: /FormulaireInscription/index.php?action=confirmation&message=Inscription+r%C3%A9ussie.&type=success");
        exit();
    }
}
