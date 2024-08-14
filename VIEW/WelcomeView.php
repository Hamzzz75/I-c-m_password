<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="card bg-dark text-white mt-5">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Choisissez une option</h2>
                <div class="text-center">
                    <a href="index.php?action=inscription" class="btn btn-primary">Inscription</a>
                    <a href="index.php?action=login" class="btn btn-secondary">Connexion</a>
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

        .btn-primary {
            background-color: #007bff; 
            border-color: #007bff; 
            margin-right: 10px;
        }

        .btn-primary:hover {
            background-color: #0069d9; 
            border-color: #0062cc; 
        }

        .btn-secondary {
            background-color: #6c757d; 
            border-color: #6c757d; 
        }

        .btn-secondary:hover {
            background-color: #5a6268; 
            border-color: #545b62; 
        }
    </style>
</body>
</html>
