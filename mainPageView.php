<?php $title = "Accueil"; ?>


<?php ob_start(); ?>
<?php require ("headerView.php"); ?>
<?php require ("navView.php"); ?>

<?php $content = ob_get_clean();  ?>

<?php require ("template.php"); ?>
