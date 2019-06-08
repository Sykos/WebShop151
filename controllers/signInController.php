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

if (mysqli_connect_errno()) {
  die("Database connection failed: " . mysqli_connect_error());
}


  class Controller extends mainController {

    public function __construct(){

      parent::__construct();

      $this->aContent['viewPath'] = './views/signInView.php';
      $this->aContent['pageTitle'] = 'Inscription';
    }

    public function render(){
      parent::render();
    }

    public function test(){
      echo 'test';
    }
  }

  /*//VÉRIFIE LES DONNÉES ENTRÉES DANS LE FORMULAIRE
  function checkData(){
    $sErrorMessage = '';
    $patternString = '^[a-zA-Zéèöüàä]+$';
    $patternDate = '\d{1,2}\/\d{1,2}\/\d{4}';

    if(preg_match($patternString, $_POST['nom'])){
      $sSurname = $_POST['nom'];
    }else{
      $sErrorMessage = 'Nom invalide';
    }

    if(preg_match($patternString, $_POST['prenom'])){
      $sName = $_POST['prenom'];
    }else{
      $sErrorMessage = 'Prénom invalide';
    }

    if(preg_match($patternDate, $_POST['dateOfBirth'])){
      $sDateOfBirth = $_POST['dateOfBirth'];
    }else{
      $sErrorMessage = 'Date invalide (dd/mm/yyyy)';
    }

    //RETOUR DES VALEURS POUR UTILISATION
    return $sSurname;
    return $sName;
    return $sDateOfBirth;
    return $sErrorMessage;
  }*/
  if(isset($_POST['submit'])){
   // checkData();
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $user=$_POST['username'];

    $query = "INSERT INTO `utilisateurs` (`UtilisateursNomDeFamille`, `UtilisateursPrenom`, `UtilisateursEmail`, `UtilisateursMotDePasse`,`UtilisateursUser`) VALUES ('$nom', '$prenom', '$email', '$pass','$user')";

    if($sErrorMessage !=''){
      echo $sErrorMessage;
    }
  }
?>