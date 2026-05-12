<?php
session_start();
header('Content-Type: application/json');
// Connexion DB omise pour la brièveté...
$host = 'localhost'; $dbname = 'gestion_academique'; $user = 'root'; $pass = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

// Données dynamiques calculées (Exemple)
$stats = [
    'enrolled' => 5,
    'credits' => 18,
    'gpa' => 13.8,
    'student_name' => 'Étudiant Mundiapolis'
];

echo json_encode($stats);
?>