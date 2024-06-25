<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'root' && $password === 'root') {
        $_SESSION['loggedin'] = true;
        header('Location: employes.html');
        exit;
    } else {
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page de connexion OSINT">
    <meta name="keywords" content="OSINT, hacking, investigation">
    <title>Connexion - OSINT</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,100&display=swap"
          rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="./style.css"/>

    <!-- Icons -->
    <link rel="icon" href="./favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/icons/favicon-32x32.png">
    <!-- Autres tailles d'icônes -->

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1a1a1a; /* Couleur de fond sombre */
            color: #ffffff; /* Texte blanc */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.8); /* Fond légèrement transparent */
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            padding: 40px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #6b73ff; /* Couleur d'accentuation */
        }

        .login-page input {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            font-size: 1em;
            background-color: #333; /* Couleur de fond pour les champs */
            color: #ffffff; /* Texte blanc */
        }

        .login-page button {
            width: 100%;
            padding: 15px;
            background-color: #6b73ff; /* Couleur d'accentuation */
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-page button:hover {
            background-color: #000dff; /* Couleur d'accentuation au survol */
        }

        .error-message {
            color: #ff4d4d; /* Couleur rouge pour les messages d'erreur */
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>

        <!-- Formulaire de connexion -->
        <div class="login-page">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">Connexion</button>
            </form>
            <!-- Affichage du message d'erreur s'il existe -->
            <?php if (isset($error_message)) : ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
