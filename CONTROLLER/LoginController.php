<?php

require_once 'MODEL/LoginModel.php';

class LoginController {
    private $model;

    public function __construct() {
        $this->model = new LoginModel();
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            // Validation des champs
            if (empty($email) || empty($password)) {
                $_SESSION['login_error'] = 'Tous les champs doivent être remplis.';
                $this->redirectBack();
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['login_error'] = "L'adresse email n'est pas valide.";
                $this->redirectBack();
                return;
            }

            // Authentification
            $user = $this->model->authenticate($email, $password);
            if ($user) {
                $this->showWelcome($user['firstname']);
            } else {
                $_SESSION['login_error'] = 'Identifiants incorrects ou compte inexistant.';
                $this->redirectBack();
            }
        }
    }

    private function redirectBack() {
        header("Location: /FormulaireInscription/index.php?action=login");
        exit();
    }

    private function showWelcome($firstname) {
        header("Location: /FormulaireInscription/VIEW/UserWelcomeView.php?firstname=" . urlencode($firstname));
        exit();
    }
}
