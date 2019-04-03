<?php $title = "Accueil";


ob_start();
require ("headerView.php");
require ("navView.php");

$content = ob_get_contents();

?>
