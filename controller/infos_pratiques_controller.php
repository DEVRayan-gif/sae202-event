<?php
function index() {
    require_once('view/autres_pages/header.php');
    require_once('view/autres_pages/menu.php');
    echo "<main><h1>Infos pratiques</h1><p>Lieu : OmniLab. Horaires : De 17h00 à 08h00. Venez équipés de vêtements confortables.</p></main>";
    require_once('view/autres_pages/footer.php');
}
?>