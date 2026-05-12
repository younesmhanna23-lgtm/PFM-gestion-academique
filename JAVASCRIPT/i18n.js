const translations = {
    fr: {
        login_btn: "Se connecter",
        nav_dashboard: "Tableau de bord",
        nav_courses: "Mes Cours",
        nav_logout: "Se déconnecter",
        courses_header: "Mes Cours Inscrits",
        courses_sub: "Retrouvez ici le détail de vos modules actuels."
    },
    en: {
        login_btn: "Login",
        nav_dashboard: "Dashboard",
        nav_courses: "My Courses",
        nav_logout: "Logout",
        courses_header: "My Enrolled Courses",
        courses_sub: "Find the details of your current modules here."
    }
};

let currentLang = localStorage.getItem('lang') || 'fr';

function applyTranslations() {
    document.querySelectorAll('[data-i18n]').forEach(element => {
        const key = element.getAttribute('data-i18n');
        if (translations[currentLang][key]) {
            if (element.tagName.toLowerCase() === 'input') {
                element.placeholder = translations[currentLang][key];
            } else {
                element.innerText = translations[currentLang][key];
            }
        }
    });
}

// Initialiser
document.addEventListener("DOMContentLoaded", () => {
    applyTranslations();
    
    const toggleBtn = document.getElementById('lang-toggle');
    if(toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            currentLang = currentLang === 'fr' ? 'en' : 'fr';
            localStorage.setItem('lang', currentLang);
            applyTranslations();
        });
    }
});