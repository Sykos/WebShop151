<?php
require ("controller/frontend.php");

if (isset($_GET['action'])){
  if($_GET['action'] == 'mainPage'){
    mainPage();
  }
  elseif($_GET['action'] == 'productPage'){
    productPage();
  }
  elseif($_GET['action'] == 'productDetailPage'){
    productDetailPage();
  }
}
else{
  mainPage();
}
?>
