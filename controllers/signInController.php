<?php

  class Controller extends mainController
  {

    public function __construct()
    {

      parent::__construct();

      $this->aContent['viewPath'] = './views/signInView.php';
      $this->aContent['pageTitle'] = 'Inscription';

    }

    public function render()
    {
      parent::render();

    }
    public static function db()
    {
      // Include config file
        define('DB_SERVER', '127.0.0.1:49386');
        define('DB_USERNAME', 'azure');
        define('DB_PASSWORD', '6#vWHD_$');
        define('DB_NAME', 'raclettev2');

        // Attempt to connect to MySQL database
        $dbconnect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if (mysqli_connect_errno())
        {
          die("Database connection failed: " . mysqli_connect_error());
        }

        if(isset($_POST['submit']))
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
        }
    }
    public static function checkData()
    {
      $bCheckOk;
      $patternString = '^[a-zA-Zéèöüàä]+$';
      $patternDate = '\d{1,2}\/\d{1,2}\/\d{4}';



      if((preg_match($patternString, $_POST['nom'])) && (preg_match($patternString, $_POST['prenom'])) && (preg_match($patternDate, $_POST['dateOfBirth'])))
      {
        $bCheckOk = true;
      }else
      {
        $bCheckOk = false;
      }
      //RETOUR DES VALEURS POUR UTILISATION
      return $bCheckOk;

    }
  }

############################
#                          #
# TRAITEMENT DES DONNÉES   #
#                          #
############################
$sErrorMessage = '';

//CHECK DES DONNÉES ET ENREGISTREMENT
if(isset($_POST['submit']))
{
  $bError = Controller::checkData();
  if ($bError == false)
  {
    $sErrorMessage = 'Données invalides';
  }elseif ($bError == true)
  {
    Controller::db();
    echo 'Enregistrement ok'
  }
  if ($sErrorMessage != '')
  {
    echo $sErrorMessage;
  }

}
