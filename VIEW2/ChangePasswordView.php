<?php
session_start();
if (!isset($_SESSION['firstname'])) {
    header("Location: /FormulaireInscription/index.php?action=login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Change Password</h2>
        <?php if (isset($_SESSION['password_error'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['password_error']; unset($_SESSION['password_error']); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['password_success'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['password_success']; unset($_SESSION['password_success']); ?>
            </div>
        <?php endif; ?>
        <form action="/FormulaireInscription/index.php?action=changePassword" method="post">
            <div class="mb-3">
                <label for="current_password" class="form-label">Mot de passe actuel</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">Nouveau mot de passe</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_new_password" class="form-label">Confirmer le nouveau mot de passe</label>
                <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
        <div class="text-center mt-4">
            <a href="/FormulaireInscription/index.php?action=home" class="btn btn-secondary">Revenir à la page précédente</a>
        </div>
    </div>
</body>
<style>
        body {
            background-color: #1c1c1c;
            color: #d3d3d3;
        }
        .container {
            background-color: #2c2c2c;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 30px;
            max-width: 500px;
            margin: auto;
        }
        .form-label {
            color: #d3d3d3;
        }
        .form-control {
            background-color: #3c3c3c;
            color: #d3d3d3;
            border: 1px solid #4c4c4c;
        }
        .form-control:focus {
            background-color: #4c4c4c;
            border-color: #5c5c5c;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #6200ee;
            border-color: #6200ee;
        }
        .btn-primary:hover {
            background-color: #3700b3;
            border-color: #3700b3;
        }
        .btn-secondary {
            background-color: #03dac6;
            border-color: #03dac6;
            color: #1c1c1c;
        }
        .btn-secondary:hover {
            background-color: #018786;
            border-color: #018786;
        }
        .alert {
            border-radius: 5px;
        }
    </style>
</html>
