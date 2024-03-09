function openMenu() {
    const nav = document.querySelector('nav');
    nav.classList.toggle('open');
}
function goToSignupPage() {
    // You can replace the URL with the actual URL of your signup page
    window.location.href = "signup.php";
}
window.addEventListener('load', function() {
    // Show loading screen
    var loadingScreen = document.getElementById('loading-screen');
    loadingScreen.style.display = 'flex';

    // Gradually reduce opacity after 10 seconds
    setTimeout(function() {
        var opacity = 1;
        var interval = setInterval(function() {
            opacity -= 0.1; // Reduce opacity by 0.1 every 100 milliseconds
            loadingScreen.style.opacity = opacity;
            if (opacity <= 0) {
                clearInterval(interval);
                loadingScreen.style.display = 'none'; // Hide loading screen when opacity reaches 0
            }
        }, 100);
    }, 2000); // Loading time 5 seconds
});