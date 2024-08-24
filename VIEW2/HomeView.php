<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="../VIEW2/ProfileView.php">Profile</a>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Paramètre</a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="/FormulaireInscription/index.php?action=changePassword">Changer mot de passe</a></li>
                <li><a class="dropdown-item" href="#">Vide</a></li>
                <li><a class="dropdown-item" href="#">Vide</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <button class="openbtn" onclick="openNav()">☰</button>
        <div class="logout-button">
            <a href="/FormulaireInscription/index.php" class="btn btn-primary">Déconnexion</a>
        </div>
        <div class="card bg-dark text-white mt-5">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">
                    <?php if (isset($_SESSION['firstname'])) { echo htmlspecialchars($_SESSION['firstname']); }?>
                    Home
                </h2>
            </div>
        </div>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
        }
    </script>
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

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.5);
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 19px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
            background-color: #575757;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
            position: absolute;
            top: 20px;
            left: 20px;
            transition: background-color 0.3s;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .openbtn:hover {
            background-color: #444;
        }

        .card {
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
            font-size: 2.5rem;
            animation: fadeInDown 1s ease-out;
        }

        .dropdown-menu {
            width: 100%; /* Limite la largeur du menu déroulant à celle de la sidebar */
            max-width: 250px; /* Assurez-vous que cela ne dépasse pas la largeur de la sidebar */
            background-color: #333;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .dropdown-item {
            font-size: 18px; /* Ajustez la taille du texte si nécessaire */
            color: #818181;
        }

        .dropdown-item:hover {
            background-color: #575757;
            color: #f1f1f1;
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
