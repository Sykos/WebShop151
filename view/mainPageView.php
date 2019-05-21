<?php $title = 'Home' ?>
<?php ob_start(); ?>

  <?php require "view/headerView.php"; ?>
  <?php require "view/navView.php" ?>
  <table>
    <tr>
      <td>kjl</td>
      <td>jmfdlk</td>
      <td>jgfdlk</td>
    </tr>
  </table>
  <?php require "view/footerView.php" ?>

<?php $content = ob_get_contents(); ?>

<?php require 'template.php' ?>
