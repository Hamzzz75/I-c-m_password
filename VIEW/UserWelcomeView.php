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
        <div class="logout-button">
            <a href="../index.php" class="btn btn-primary">Déconnexion</a>
        </div>
        <div class="card bg-dark text-white mt-5">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Bienvenue, <?php echo htmlspecialchars($_GET['firstname']); ?></h2>
            </div>
        </div>
    </div>
</body>
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
            position: relative;
        }

        .card {
            width: 400px;
        }

        .card-title {
            color: white;
        }

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</html>
