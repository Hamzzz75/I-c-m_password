<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        require_once 'CONTROLLER/LoginController.php';
        $controller = new LoginController();
        $controller->authenticate();
    } else {
        require_once 'CONTROLLER/InscriptionController.php';
        $controller = new InscriptionController();
        $controller->submit();
    }
} 
else {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'confirmation':
                require_once 'VIEW/ConfirmationView.php';
                break;
            case 'userwelcome':
                require_once 'VIEW/UserWelcomeView.php';
                break;
            case 'inscription':
                require_once 'VIEW/InscriptionView.php';
                break;
            case 'login':
                require_once 'VIEW/LoginView.php';
                break;
            case 'welcome':
                require_once 'VIEW/WelcomeView.php';
                break;
            default:
                require_once 'VIEW/WelcomeView.php';
                break;
        }
    } 

    else {
        require_once 'VIEW/WelcomeView.php';
    } 
}
?>
