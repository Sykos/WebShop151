<?php $title = "Accueil"; ?>


<?php ob_start(); ?>
<div class="container">
  <div class="row">
    <div class="col-md-12"><?php require ("view/headerView.php"); ?></div>
  </div>
  <div class="row">
    <div class="col-md-1"><?php require ("view/navView.php"); ?></div>
  </div>
  <div class="row">
    <div class="col-md-12"><?php require ("view/footerView.php"); ?></div>
  </div>
</div>

<?php $content = ob_get_contents(); ?>
