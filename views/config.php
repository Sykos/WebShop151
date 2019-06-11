<?php
    // Include config file
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    define('DB_SERVER', '127.0.0.1:49386');
    define('DB_USERNAME', 'azure');
    define('DB_PASSWORD', '6#vWHD_$');
    define('DB_NAME', 'raclettev2');

    /* Attempt to connect to MySQL database */
    $dbconnect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if (mysqli_connect_errno())
    {
        die("Database connection failed: " . mysqli_connect_error());
    }

    /*if(isset($_POST['submit']))
    {
        // checkData();
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $user=$_POST['username'];

        $query = "INSERT INTO `utilisateurs` (`UtilisateursNomDeFamille`, `UtilisateursPrenom`, `UtilisateursEmail`, `UtilisateursMotDePasse`,`UtilisateursUser`) VALUES ('$nom', '$prenom', '$email', '$password','$user')";

        if ($dbconnect->query($query) === TRUE)
        {
            echo "New record created successfully";
        } else
        {
	           die($dbconnect->error);
        }
    }*/
