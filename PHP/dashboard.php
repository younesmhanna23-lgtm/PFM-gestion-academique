<?php
    // dashboard page
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    
    if(isset($_POST["logout"])){
        session_destroy();
        header('location: login.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Universitaire</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="../IMAGES/mundiapolis icon.ico" type="image/x-icon">
</head>
<body>

    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo">
                <img src="../IMAGES/logo mundiapolis.png" alt="University Logo" width="180">
            </div>
            <ul class="nav-links">
                <li><a href="#" class="active"><i class="fas fa-home"></i> Tableau de bord</a></li>
                <li><a href="#"><i class="fas fa-book"></i> Mes Cours</a></li>
                <li><a href="#"><i class="fas fa-calendar-alt"></i> Emploi du temps</a></li>
                <li><a href="#"><i class="fas fa-graduation-cap"></i> Notes</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Paramètres</a></li>
                <li><a href="login.php" class="logout"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="topbar">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher des cours, professeurs...">
                </div>
                <div class="user-profile">
                    <span class="notification"><i class="fas fa-bell"></i></span>
                    <div class="avatar">
                        <img src="https://via.placeholder.com/40" alt="User Profile">
                    </div>
                    <span class="user-name">
                        <?php echo htmlspecialchars($_SESSION['username']); ?>
                        <form action="dashboard.php" method="post">
                            <input type="submit" name="logout" value="logout">
                        </form>
                    </span>
                </div>
            </header>

            <div class="dashboard-header">
                <h2>Aperçu de l'étudiant</h2>
                <p>Voici un bref résumé de vos progrès académiques pour ce semestre.</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: #e3f2fd; color: #007BFF;">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="stat-info">
                        <h3>5</h3>
                        <p>Cours Inscrits</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #e8f5e9; color: #28a745;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3>18</h3>
                        <p>Crédits Validés</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #fff3cd; color: #ffc107;">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-info">
                        <h3>13.8</h3>
                        <p>Moyenne Actuelle</p>
                    </div>
                </div>
            </div>

            <div class="recent-activity">
                <h3>Emploi du temps du jour</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Nom du Cours</th>
                            <th>Heure</th>
                            <th>Salle</th>
                            <th>Professeur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Développement Web HTML & CSS</td>
                            <td>9:00 - 12:00</td>
                            <td>G1.5</td>
                            <td>Dr. </td>
                        </tr>
                        <tr>
                            <td>Gestion de Base de Données</td>
                            <td>13:00 - 14:30</td>
                            <td>G3.5</td>
                            <td>Dr.</td>
                        </tr>
                        <tr>
                            <td>Algorithmique et Logique</td>
                            <td>15:00 - 16:30</td>
                            <td>Labo 1.1</td>
                            <td>Prof.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script src="../JAVASCRIPT/dashboard.js"></script>
</body>
</html>