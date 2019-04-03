<?php
require ("controller.php");

if (isset($_GET['action'])){
  if($_GET['action'] == 'mainPage'){
    mainPage();
  }
}
else{
  mainPage();
}
?>
