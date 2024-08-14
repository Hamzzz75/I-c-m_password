<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="container">
        <div class="card bg-dark text-white mt-5">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Inscription</h2>

                <form id="inscriptionForm" method="post" action="/FormulaireInscription/index.php" onsubmit="return validateForm()">
                    <div class="mb-3">
                        <label for="exampleInputFirstName1" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="exampleInputFirstName1" name="firstname" value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputLastName1" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="exampleInputLastName1" name="lastname" value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required onblur="checkEmail()">
                        <?php if (isset($_GET['message']) && $_GET['message'] == "L'adresse email est déjà utilisée."): ?>
                            <div class="alert alert-danger">L'adresse email est déjà utilisée.</div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="" required>
                        <div id="passwordHelp" class="form-text" style="display: none;">Le mot de passe doit contenir 8 caractères minimum dont au moins une lettre majuscule, une lettre minuscule et un caractère spécial.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label">Re-saisissez votre mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" name="confirm_password" value="" required>
                    </div>
                    <div id="passwordError" class="alert alert-danger" style="display: none;">Le mot de passe ne répond pas aux critères de sécurité.</div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </form>

                <!-- Ajout du bouton "Revenir à la page précédente" -->
                <div class="text-center mt-4">
                    <a href="index.php?action=welcome" class="btn btn-secondary">Revenir à la page précédente</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var passwordInput = document.getElementById("exampleInputPassword1");
            var passwordHelpText = document.getElementById("passwordHelp");

            passwordInput.addEventListener("focus", function() {
                passwordHelpText.style.display = "block";
            });

            passwordInput.addEventListener("blur", function() {
                passwordHelpText.style.display = "none";
            });
        });

        function validateForm() {
            var password = document.getElementById("exampleInputPassword1").value;
            var confirmPassword = document.getElementById("exampleInputPassword2").value;
            var passwordHelpText = document.getElementById("passwordHelp");
            var passwordError = document.getElementById("passwordError");
            var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (password !== confirmPassword) {
                alert("Les mots de passe ne correspondent pas.");
                return false;
            }

            if (!regex.test(password)) {
                passwordHelpText.style.display = "block";
                passwordError.style.display = "block";
                return false;
            } else {
                passwordHelpText.style.display = "none";
                passwordError.style.display = "none";
            }

            return true;
        }

        function checkEmail() {
            var email = document.getElementById("exampleInputEmail1").value;
            var emailError = document.getElementById("emailError");

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../CONTROLLER/CheckEmailController.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if (xhr.responseText === "exists") {
                        document.getElementById("exampleInputEmail1").classList.add("error");
                        emailError.style.display = "block";
                    } else {
                        document.getElementById("exampleInputEmail1").classList.remove("error");
                        emailError.style.display = "none";
                    }
                } else {
                    emailError.style.display = "none";
                }
            };
            xhr.send("email=" + encodeURIComponent(email));
        }
    </script>
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

        .form-control.error {
            border-color: red;
        }
    </style>
</html>
