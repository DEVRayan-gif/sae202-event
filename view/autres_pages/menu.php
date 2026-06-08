<header>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    <img src="/view/img/sae202-event_logo1.png" alt="logo1" id="logo1" />
    <nav>
        <a href="/">Accueil</a>
        <a href="/concept">Concept</a>
        <a href="/infos_pratiques">Infos pratiques</a>
        <?php if (isset($_SESSION['client_nom'])): ?>
            <a href="/profil">Mon Profil</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
            <a href="/admin">Administration</a>
        <?php endif; ?>
    </nav>
    <?php
    if (isset($_SESSION['client_nom'])) {
        echo '<div id="connexion">Bienvenue ' . $_SESSION['client_nom'] . ' <a href="/connexion/deconnexion">Déconnexion</a></div>';
    } else {
        echo '<div id="connexion">
                <a href="/connexion">Connexion</a> 
                <a href="/connexion/inscription">Inscription</a>
        </div>';
    }
    ?>
</header>