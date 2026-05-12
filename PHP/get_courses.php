<?php
header('Content-Type: application/json');
// Configuration de la base de données
$host = 'localhost';
$dbname = 'gestion_academique';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // Récupération des modules (Simulation pour l'étudiant connecté)
    $stmt = $pdo->query("SELECT name, code, credits FROM Module_ LIMIT 6");
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($courses);
} catch(PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>