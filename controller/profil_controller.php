<?php
function index() {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (!isset($_SESSION['client_nom'])) {
        header('Location: /connexion');
        exit();
    }
    
    require_once('view/autres_pages/header.php');
    require_once('view/autres_pages/menu.php');
    
    echo "<main><h1>Mon Profil</h1>";
    echo "<p>C'est ici que vous pouvez modifier vos informations personnelles, visualiser les détails de votre équipe et partager votre score sur les réseaux sociaux une fois la partie terminée!</p>";
    
    echo "<h2>Laisser un avis</h2>";
    echo "<form action='/profil/avis' method='POST'>";
    echo "<textarea name='commentaire' placeholder='Racontez votre expérience...' required></textarea><br>";
    echo "<button type='submit'>Soumettre à l'administrateur</button>";
    echo "</form></main>";
    
    require_once('view/autres_pages/footer.php');
}

// Logique de traitement de l'avis et d'enregistrement en BDD à venir dans la fonction avis()
?>