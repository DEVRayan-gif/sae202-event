<?php
function index() {
    if (session_status() === PHP_SESSION_NONE) session_start();
    // Vérification de sécurité pour n'autoriser que les administrateurs
    if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] == false) {
        die("Accès non autorisé.");
    }
    
    require_once('view/autres_pages/header.php');
    require_once('view/autres_pages/menu.php');
    
    echo "<main><h1>Back-Office : Panneau d'Administration</h1>";
    echo "<ul><li><a href='/admin/inscrits'>Gérer les équipes et inscrits</a></li>";
    echo "<li><a href='/admin/scores'>Saisir les scores de l'Escape Game</a></li>";
    echo "<li><a href='/admin/commentaires'>Modérer les commentaires des joueurs</a></li></ul></main>";
    
    require_once('view/autres_pages/footer.php');
}
?>