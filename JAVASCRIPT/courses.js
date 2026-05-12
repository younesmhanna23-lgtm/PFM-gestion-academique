document.addEventListener("DOMContentLoaded", function() {
    // Appel AJAX vers PHP pour récupérer les cours
    fetch('../PHP/get_courses.php')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('courses-container');
            data.forEach(course => {
                const card = document.createElement('div');
                card.className = 'course-card';
                card.innerHTML = `
                    <div class="course-code">${course.code}</div>
                    <h3 class="course-title">${course.name}</h3>
                    <div class="course-credits"><i class="fas fa-star"></i> ${course.credits} Crédits</div>
                `;
                container.appendChild(card);
            });
        })
        .catch(error => console.error('Erreur:', error));
});