<?php

require_once 'MODEL/ChangePasswordModel.php';

class ChangePasswordController {
    private $model;

    public function __construct() {
        $this->model = new ChangePasswordModel();
    }

    public function changePassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();

            if (!isset($_SESSION['email'])) {
                $_SESSION['password_error'] = 'Utilisateur non authentifié.';
                $this->redirectBack();
                return;
            }

            $current_password = isset($_POST['current_password']) ? $_POST['current_password'] : '';
            $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';
            $confirm_new_password = isset($_POST['confirm_new_password']) ? $_POST['confirm_new_password'] : '';

            // Ajout de messages de débogage
            error_log("Email from session: " . $_SESSION['email']);
            error_log("Current password: " . $current_password);
            error_log("New password: " . $new_password);
            error_log("Confirm new password: " . $confirm_new_password);

            // Validation des champs
            if (empty($current_password) || empty($new_password) || empty($confirm_new_password)) {
                $_SESSION['password_error'] = 'Tous les champs doivent être remplis.';
                $this->redirectBack();
                return;
            }

            if ($new_password !== $confirm_new_password) {
                $_SESSION['password_error'] = 'Les nouveaux mots de passe ne correspondent pas.';
                $this->redirectBack();
                return;
            }

            // Vérification du mot de passe actuel
            $email = $_SESSION['email']; // Assurez-vous que l'email est stocké dans la session lors de la connexion
            if (!$this->model->checkCurrentPassword($email, $current_password)) {
                $_SESSION['password_error'] = 'Le mot de passe actuel est incorrect.';
                $this->redirectBack();
                return;
            }

            // Mise à jour du mot de passe
            if ($this->model->updatePassword($email, $new_password)) {
                $_SESSION['password_success'] = 'Le mot de passe a été mis à jour avec succès.';
                header("Location: /FormulaireInscription/index.php?action=changePassword");
                exit();
            } else {
                $_SESSION['password_error'] = 'Erreur lors de la mise à jour du mot de passe.';
                $this->redirectBack();
            }
        }
    }

    private function redirectBack() {
        header("Location: /FormulaireInscription/VIEW2/ChangePasswordView.php");
        exit();
    }
}
