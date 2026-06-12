<?php
session_start();
require_once('/var/www/sae202-event/conf/conf.inc.php');

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$items = explode('/', $path);


if (empty($items[1])) {
    $controller = 'accueil';
} else {
    $controller = str_replace('.php', '', $items[1]); // déplacé ici
}

if ($controller === 'gestion') {
    $controller = 'admin';
}

if (empty($items[2])) {
    $action = 'index';
} else {
    $action = $items[2];
}

// Cas spécial : connexion admin avec classe
if ($controller === 'connexion' && $action === 'validation_connexion_admin') {
    require_once('/var/www/sae202-event/controller/connexion_admin_controller.php');
    $c = new ConnexionAdminController();
    $c->validerConnexion();
    exit;
}

if ($controller === 'connexion' && $action === 'admin') {
    require_once('/var/www/sae202-event/controller/connexion_admin_controller.php');
    // affiche la vue directement
    include('/var/www/sae202-event/admin/connexion_admin.php');
    exit;
}

require_once('/var/www/sae202-event/controller/' . $controller . '_controller.php');
$action();
?>