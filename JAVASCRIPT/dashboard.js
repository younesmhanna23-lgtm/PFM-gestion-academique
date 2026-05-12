// Wait for the HTML to fully load before running the script
document.addEventListener("DOMContentLoaded", function() {


    // --- NOUVEAU : Récupération des statistiques depuis PHP ---
    fetch('../PHP/get_dashboard_stats.php')
        .then(response => response.json())
        .then(data => {
            document.querySelector('.user-name').innerText = `Bienvenue, ${data.student_name}`;
            // Mettre à jour les cartes de statistiques en sélectionnant les éléments correspondants
            const statValues = document.querySelectorAll('.stat-info h3');
            if(statValues.length >= 3) {
                statValues[0].innerText = data.enrolled;
                statValues[1].innerText = data.credits;
                statValues[2].innerText = data.gpa;
            }
        })
        .catch(error => console.error('Erreur lors du chargement des stats:', error));

    // --- 1. Sidebar Navigation Highlight --- (Le code existant continue ici...)
    const navLinks = document.querySelectorAll(".nav-links a");
    // ... reste du code

    // --- 1. Sidebar Navigation Highlight ---
    const navLinks = document.querySelectorAll(".nav-links a");

    navLinks.forEach(link => {
        link.addEventListener("click", function(event) {
            // Let the logout link work normally so it goes back to login.html
            if(this.classList.contains("logout")) return;

            // Prevent the page from jumping to the top when clicking dummy links
            event.preventDefault();

            // Remove the 'active' class from all links
            navLinks.forEach(nav => nav.classList.remove("active"));

            // Add the 'active' class to the link you just clicked
            this.classList.add("active");
        });
    });

    // --- 2. Notification Bell Alert ---
    const notificationBell = document.querySelector(".notification");
    
    if (notificationBell) {
        notificationBell.addEventListener("click", function() {
            // Traduit en français
            alert("🔔 Vous avez 3 nouvelles notifications académiques !");
        });
    }

    // --- 3. Search Bar Interaction ---
    const searchInput = document.querySelector(".search-bar input");
    
    if (searchInput) {
        searchInput.addEventListener("keypress", function(event) {
            // Check if the key pressed was "Enter"
            if (event.key === "Enter") {
                // Traduit en français
                alert("Recherche dans la base de données de l'université pour : " + searchInput.value);
                // Clear the search bar after searching
                searchInput.value = ""; 
            }
        });
    }

});