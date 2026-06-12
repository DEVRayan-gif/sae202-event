<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNI – Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/svg" href="/view/images/OMNI_petit_rouge-blanc.svg">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/view/css/sae202_style.css">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/nasalization">
</head>
<body class="admin-body">

<div class="admin-login-wrap">
    <div class="admin-corner admin-corner-tl"></div>
    <div class="admin-corner admin-corner-tr"></div>
    <div class="admin-corner admin-corner-bl"></div>
    <div class="admin-corner admin-corner-br"></div>

    <div class="admin-login-header">
        <img src="/view/images/OMNI_petit_rouge-blanc.svg" alt="OMNI" height="50">
        <h1 class="admin-login-title">OMNI <span>:</span> ADMIN</h1>
        <p class="admin-login-subtitle">ACCES RESERVE ADMINISTRATEUR</p>
    </div>

    <?php if (isset($_SESSION['erreur'])) : ?>
        <div class="admin-alert"><?= htmlspecialchars($_SESSION['erreur']) ?></div>
        <?php unset($_SESSION['erreur']); ?>
    <?php endif; ?>

    <form action="/connexion/validation_connexion_admin" method="POST" class="admin-login-form">
        <div class="admin-form-group">
            <label>IDENTIFIANT</label>
            <input type="email" name="client_mail" placeholder="Admin@email.com" required>
        </div>
        <div class="admin-form-group">
            <label>MOT DE PASSE</label>
            <input type="password" name="mot_de_passe" placeholder="••••••••••••••" required>
        </div>
        <button type="submit" class="admin-login-btn">SE CONNECTER</button>
    </form>

    <p class="admin-login-footer">// Session chiffrée &nbsp;–&nbsp; accès tracé par <span>OMNI_SYSTEM</span></p>
</div>

</body>
</html>