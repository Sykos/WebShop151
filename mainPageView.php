<?php $title = "Accueil";


ob_start();
require ("headerView.php");
require ("navView.php");
require ("footerView.php");

$content = ob_get_contents();

?>
