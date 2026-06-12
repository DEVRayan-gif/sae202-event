<?php
require_once('/var/www/sae202-event/model/connexion_model.php');

function index() {
    if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
        header('Location: /connexion/admin');
        exit;
    }
    header('Location: /gestion/inscrits');
    exit;
}

function inscrits() {
    if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
        header('Location: admin/connexion_admin.php');
        exit;
    }
    $inscrits       = getInscrits();
    $nbEquipes      = getNbEquipes();
    $nbCommentaires = getNbCommentaires();
    include('/var/www/sae202-event/admin/inscrits_admin.php');
}