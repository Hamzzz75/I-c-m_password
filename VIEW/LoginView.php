<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="card bg-dark text-white mt-5">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Connexion</h2>
                
                <form method="post" action="/FormulaireInscription/index.php">
                    <input type="hidden" name="action" value="login">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                    </div>
                    <?php session_start(); ?>
                    <?php if (isset($_SESSION['login_error'])): ?>
                        <div class="alert alert-danger">
                            <?php echo htmlspecialchars($_SESSION['login_error']); ?>
                        </div>
                        <?php unset($_SESSION['login_error']); ?>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary">Se connecter</button>

                    <div class="text-center mt-4">
                        <a href="index.php?action=forgotPassword">Mot de passe oublié ?</a>
                    </div>

                </form>
                
                <div class="text-center mt-4">
                    <a href="index.php?action=welcome" class="btn btn-secondary">Revenir à la page précédente</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #343a40; 
            color: white; 
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 400px;
        }

        .card-title {
            color: white;
        }

        .form-control {
            background-color: #495057; 
            color: white; 
        }

        .btn-primary {
            background-color: #007bff; 
            border-color: #007bff; 
        }

        .btn-primary:hover {
            background-color: #0069d9; 
            border-color: #0062cc; 
        }

        .form-text {
            color: rgba(255, 255, 255, 0.6); 
        }
    </style>
</body>
</html>
