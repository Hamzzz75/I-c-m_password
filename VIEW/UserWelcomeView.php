<?php
session_start();
?>

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
                <h2 class="card-title text-center mb-4">Bienvenue, 
                    <?php 
                        if (isset($_SESSION['firstname'])) {
                            echo htmlspecialchars($_SESSION['firstname']); 
                        }
                    ?>
                </h2>
                <div class="text-center mt-4">
                    <a href="../VIEW2/HomeView.php" class="btn btn-success">Menu principale</a>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
        body {
            background-color: #343a40; 
            color: white; 
            font-family: 'Arial', sans-serif;
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
            background-color: #222;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
        }

        .card-title {
            color: white;
            animation: fadeInDown 1s ease-out;
        }

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .btn-success {
            background-color: #28a745; 
            border-color: #28a745; 
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-success:hover {
            background-color: #218838; 
            border-color: #1e7e34; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</html>
