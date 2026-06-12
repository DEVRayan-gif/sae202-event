<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNI – Back-office</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/svg" href="/view/images/OMNI_petit_rouge-blanc.svg">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/nasalization">
    <link rel="stylesheet" href="/view/css/sae202_style.css">
</head>
<body>

<div class="bo-wrap">

    <!-- ===== SIDEBAR ===== -->
    <aside class="bo-sidebar">
        <div class="bo-logo">
            <img src="/view/images/OMNI_petit_rouge-blanc.svg" alt="OMNI" height="38">
        </div>

        <p class="bo-breadcrumb">Gestion · Protocole Zéro</p>

        <nav class="bo-nav">
            <a href="/inscrit_admin" class="bo-nav-item active">
                <span class="bo-nav-icon">&#9707;</span> Inscrits
            </a>
            <a href="/admin/commentaires" class="bo-nav-item">
                <span class="bo-nav-icon">&#9744;</span> Commentaires
                <span class="bo-nav-badge">3</span>
            </a>
            <a href="/admin/scores" class="bo-nav-item">
                <span class="bo-nav-icon">&#9641;</span> Saisie des scores
            </a>
        </nav>

        <div class="bo-sidebar-footer">
            <a href="/accueil" class="bo-nav-link">
                <span>&#8594;</span> Retour au site
            </a>
            <a href="/deconnexion" class="bo-nav-link">
                <span>&#8594;</span> Déconnexion
            </a>
        </div>
    </aside>

    <!-- ===== MAIN ===== -->
    <main class="bo-main">

        <div class="bo-topbar">
            <div>
                <h1 class="bo-page-title">Liste des inscrits</h1>
                <p class="bo-page-sub">// OMNI_SYSTEM · <?= count($inscrits) ?> PARTICIPANTS</p>
            </div>
            <div class="bo-status">
                <span class="bo-dot"></span>
                <?= htmlspecialchars($_SESSION['user_pseudo']) ?> · connecté
            </div>
        </div>

        <div class="bo-content">

            <!-- Stats -->
            <div class="bo-stats">
                <div class="bo-stat">
                    <div class="bo-stat-num"><?= count($inscrits) ?></div>
                    <div class="bo-stat-label">Inscrits</div>
                </div>
                <div class="bo-stat">
                    <div class="bo-stat-num"><?= $nbEquipes ?></div>
                    <div class="bo-stat-label">Équipes</div>
                </div>
                <div class="bo-stat">
                    <div class="bo-stat-num red"><?= $nbCommentaires ?></div>
                    <div class="bo-stat-label">Avis en attente</div>
                </div>
                <div class="bo-stat last">
                    <div class="bo-stat-num cyan">—</div>
                    <div class="bo-stat-label">Meilleur temps</div>
                </div>
            </div>

            <!-- Section titre -->
            <div class="bo-section-head">
                <span class="bo-section-num">01</span>
                <h2 class="bo-section-title">Participants</h2>
                <div class="bo-section-line"></div>
            </div>

            <!-- Tableau -->
            <table class="bo-table">
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>E-mail</th>
                        <th>Équipe</th>
                        <th>Créneau</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inscrits as $inscrit) : ?>
                    <tr>
                        <td class="bold"><?= htmlspecialchars($inscrit['pseudo']) ?></td>
                        <td><?= htmlspecialchars($inscrit['email']) ?></td>
                        <td class="team">
                            <?= $inscrit['nom_equipe']
                                ? htmlspecialchars($inscrit['nom_equipe'])
                                : '<span style="color:#444">—</span>' ?>
                        </td>
                        <td class="slot">
                            <?= $inscrit['date_heure_session']
                                ? date('D d · H\hi', strtotime($inscrit['date_heure_session']))
                                : '<span style="color:#444">—</span>' ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </main>
</div>

</body>
</html>