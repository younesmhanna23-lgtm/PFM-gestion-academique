document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Empêche le rechargement
    
    const formData = new FormData();
    formData.append('username', document.getElementById('username').value);
    formData.append('password', document.getElementById('password').value);

    fetch('../PHP/auth.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            window.location.href = 'dashboard.html'; // Redirection si succès
        } else {
            document.getElementById('login-message').innerText = data.message;
        }
    });
});