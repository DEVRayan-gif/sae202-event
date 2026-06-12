<?php
function index() {
    session_destroy();
    header('Location: /accueil');
    exit;
}