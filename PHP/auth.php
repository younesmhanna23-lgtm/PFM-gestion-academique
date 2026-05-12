<?php
session_start();
header('Content-Type: application/json');

$host = 'localhost'; $dbname = 'gestion_academique'; $user = 'root'; $pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM User_ WHERE username = ?");
    $stmt->execute([$username]);
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

    // En production, utilisez password_verify() avec des mots de passe hachés
    if ($user_data && $password === $user_data['password']) {
        $_SESSION['id_user'] = $user_data['id_user'];
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Identifiants incorrects']);
    }
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur serveur']);
}
?>