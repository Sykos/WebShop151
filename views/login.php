<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // USERNAME AND PASSWORD SENT FROM FORM

      $myusername = mysqli_real_escape_string($db,$_POST['UtilisateursNomDeFamille']);
      $mypassword = mysqli_real_escape_string($db,$_POST['UtilisateursMotDePasse']);

      $sql = "SELECT id FROM utilisateurs WHERE UtilisateursNomDeFamille = '$myusername' and UtilisateursMotDePasse = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // IF RESULT MATCHED $MYUSERNAME AND $MYPASSWORD, TABLE ROW MUST BE 1 ROW

      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
