<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil – OMNI</title>
    <link rel="icon" type="image/svg" href="/view/images/OMNI_petit_rouge-blanc.svg">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/view/css/sae202_style.css">
</head>
<body>

<?php include '/var/www/sae202-event/view/autres_pages/header.php'; ?>

<section class="profil-section">
    <p class="section-eyebrow">Espace personnel</p>
    <div class="section-divider"></div>
    <h2 class="section-title">MON <span class="accent">PROFIL</span></h2>

    <div class="profil-layout">

        <!-- COLONNE GAUCHE -->
        <div class="profil-card">
            <div class="profil-avatar">
                <?= strtoupper(substr($user['pseudo'], 0, 2)) ?>
            </div>
            <div class="profil-pseudo"><?= htmlspecialchars($user['pseudo']) ?></div>
            <div class="profil-role"><?= htmlspecialchars($user['role']) ?></div>
            <div class="profil-date">Membre depuis le <?= date('d/m/Y', strtotime($user['date_modification'])) ?></div>
        </div>

        <!-- COLONNE DROITE -->
        <div class="profil-formulaire">

            <?php if (isset($_SESSION['erreur'])) : ?>
                <div class="alert-erreur"><?= htmlspecialchars($_SESSION['erreur']) ?></div>
                <?php unset($_SESSION['erreur']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['succes'])) : ?>
                <div class="alert-succes"><?= htmlspecialchars($_SESSION['succes']) ?></div>
                <?php unset($_SESSION['succes']); ?>
            <?php endif; ?>

            <form action="/profil/modifier" method="POST" class="profil-form">
                <div class="form-group">
                    <label>Pseudo</label>
                    <input type="text" name="pseudo" value="<?= htmlspecialchars($user['pseudo']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Téléphone</label>
                    <input type="text" name="telephone" value="<?= htmlspecialchars($user['telephone'] ?? '') ?>">
                </div>
                <div class="form-divider"></div>
                <p class="form-hint">Laisser vide pour ne pas changer le mot de passe</p>
                <div class="form-group">
                    <label>Nouveau mot de passe</label>
                    <input type="password" name="mot_de_passe">
                </div>
                <div class="form-group">
                    <label>Confirmer le mot de passe</label>
                    <input type="password" name="mot_de_passe2">
                </div>
                <button type="submit" class="profil-btn">Sauvegarder</button>
            </form>
        </div>

    </div>
</section>

<?php include '/var/www/sae202-event/view/autres_pages/footer.php'; ?>

</body>
</html>