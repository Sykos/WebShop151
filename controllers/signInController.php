<?php

  class Controller extends mainController {

    public function __construct(){

      parent::__construct();

      $this->aContent['viewPath'] = './views/signInView.php';
      $this->aContent['pageTitle'] = 'Inscription';
    }

    public function render(){
      parent::render();
    }

    if(isset($_POST['submit'])){
        // checkData();
         $nom=$_POST['nom'];
       $prenom=$_POST['prenom'];
       $email=$_POST['email'];
       $password=$_POST['password'];
       $user=$_POST['username'];
      
         $query = "INSERT INTO `utilisateurs` (`UtilisateursNomDeFamille`, `UtilisateursPrenom`, `UtilisateursEmail`, `UtilisateursMotDePasse`,`UtilisateursUser`) VALUES ('$nom', '$prenom', '$email', '$password','$user')";
          
      if ($dbconnect->query($query) === TRUE) {
          echo "New record created successfully";
      } else {
          die($dbconnect->error);
      }
      }

  }

