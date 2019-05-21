<?php
  $conn = new mysqli("127.0.0.1:49386", "azure", "6#vWHD_$", "raclettev2");
  
  if ($conn->connect_error) {
    die("ERROR: Unable to connect: " . $conn->connect_error);
  } 

  echo 'Connected to the database.<br>';

  $result = $conn->query("SELECT ProduitNom FROM produits");

  echo "Number of rows: $result->num_rows";

  $result->close();

  $conn->close();
?>