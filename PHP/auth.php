<?php
    echo "auth";

    // Nettoient la valeur des champs pour éviter les attaques 
    $name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // hash du mot de passe pour une sécurité accrue 
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cookie de session pour garder l'utilisateur connecté
    setcookie('username', $name, time() + (86400 * 30), "/"); // expire dans 30 jours
    setcookie('password', $password, time() + (86400 * 30), "/"); // expire dans 30 jours

    // Session pour stocker les données de l'utilisateur
    session_start();
    $_SESSION['username'] = $name;
    $_SESSION['password'] = $password;

    // Redirige vers le tableau de bord après la connexion
    if($name === "admin" && $password === "admin123") {
        header("Location: courses.php");
        exit();
    } else {
        // Redirige vers la page de connexion avec un message d'erreur
        header("Location: dashboard.php");
        exit();
    }


?>