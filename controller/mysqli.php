<?php
  $conn = new mysqli("https://raclettev2.scm.azurewebsites.net", "azure", "6#vWHD_$", "raclettev2");
  
  if ($conn->connect_error) {
    die("ERROR: Unable to connect: " . $conn->connect_error);
  } 

  echo 'Connected to the database.<br>';

  $result = $conn->query("SELECT ProduitNom FROM produits");

  echo "Number of rows: $result->num_rows";

  $result->close();

  $conn->close();
?>