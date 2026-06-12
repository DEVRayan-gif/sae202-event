<?php

function connexionBDD() {
    return new PDO(
        'mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8mb4',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}

function getUserByEmail($email) {
    $pdo = connexionBDD();
    $stmt = $pdo->prepare("SELECT * FROM UTILISATEUR WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function emailExiste($email) {
    $pdo = connexionBDD();
    $stmt = $pdo->prepare("SELECT id_utilisateur FROM UTILISATEUR WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch();
}

function creerUtilisateur($pseudo, $email, $mdp_hash, $telephone) {
    $pdo = connexionBDD();
    $stmt = $pdo->prepare("INSERT INTO UTILISATEUR (pseudo, email, mot_de_passe, telephone, role) VALUES (?, ?, ?, ?, 'joueur')");
    $stmt->execute([$pseudo, $email, $mdp_hash, $telephone]);
}

function getInscrits() {
    $pdo = connexionBDD();
    $stmt = $pdo->query("
        SELECT 
            u.pseudo,
            u.email,
            e.nom_equipe,
            r.date_heure_session
        FROM UTILISATEUR u
        LEFT JOIN EQUIPE e ON u.id_equipe = e.id_equipe
        LEFT JOIN RESERVATION r ON e.id_equipe = r.id_equipe
        WHERE u.role = 'joueur'
        ORDER BY u.id_utilisateur
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getNbEquipes() {
    $pdo = connexionBDD();
    return $pdo->query("SELECT COUNT(*) FROM EQUIPE")->fetchColumn();
}

function getNbCommentaires() {
    $pdo = connexionBDD();
    return $pdo->query("SELECT COUNT(*) FROM COMMENTAIRE")->fetchColumn();
}