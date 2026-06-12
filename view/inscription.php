<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNI – Inscription</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/svg" href="/view/images/OMNI_petit_rouge-blanc.svg">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/view/css/sae202_style.css">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/nasalization">
</head>
<body>
 
<?php include '/var/www/sae202-event/view/autres_pages/header.php'; ?>
 
<?php if (!empty($_SESSION['erreur'])): ?>
    <div class="msg-error"><?= htmlspecialchars($_SESSION['erreur']) ?></div>
    <?php unset($_SESSION['erreur']); ?>
<?php endif; ?>

<div id="contenu" class="inscription-wrap">
   <h1>Inscription</h1>
   <p>Formulaire d'inscription</p>
   <form action="/connexion/validation_inscription" method="post">
       <input type="text" name="client_nom" placeholder="Nom">
       <input type="text" name="client_prenom" placeholder="Prénom">
       <input type="text" name="client_mail" placeholder="Email">
        <input type="text" name="client_telephone" placeholder="Téléphone (facultatif)">
       <input type="password" name="mot_de_passe" placeholder="Mot de passe">
       <input type="password" name="mot_de_passe2" placeholder="Confirmer mot de passe">
       <input type="submit" value="Inscription">
   </form>
</div>
 
<?php include '/var/www/sae202-event/view/autres_pages/footer.php'; ?>

</body>
</html>