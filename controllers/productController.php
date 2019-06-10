<?php

    class Controller extends mainController
    {

        public $sProduct;
        //SE LANCE AUTOMATIQUEMENT ET CHARGE TOUT LE CONTENU
        public function __construct()
        {

            parent::__construct();

            $this->aContent['viewPath'] = './views/productView.php';
            $this->aContent['pageTitle'] = 'Produit';
            $this->aContent['css'][] = './public/vendor/css/productView.css';
            $this->aContent['css'][] = './public/vendor/css/productCard.css';

            //$this->sProduct = $_GET['product'];
        }

        /*
        //Récupérer data d'un produit
        public function getProductData(){
        $oProductData = new cProductModel($this->sProduct);
        }*/

        public function render()
        {
            parent::render();
        }

        public static function getProductData()
        {
            //RÉCUPÉRATION DES DONNÉES RELATIVES AU PRODUIT À AFFICHER
            
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

                $nom = "SELECT * FROM produits";
                echo($nom);

                //$prix = "SELECT ProduitPrix FROM produits";
                //$desc = "SELECT ProduitCartDesc FROM produits";

          
                if ($dbconnect->query($nom) === TRUE)
                {
                    echo "Data fetched";
                    var_dump($nom);
                   // var_dump($prix);
                    //var_dump($desc);
                }else
                {
          	        die($dbconnect->error);
                }
            
        
        }

        /*public static function createProduct()
        {
            //-- RÉCUPÉRATION DES DONNÉS DE L'ARTICLE --


            while (Tant que ça n'est pas le dernier enregistrement dans la db)
            {
                echo '<div class "cardProduct">
                        <img src="../public/images/'.Nom du produit = nom image.' alt="'.Nom produit.'" style="width=100%">
                        <h1>'.Nom produit.'</h1>
                        <p class="price">'.Prix de l'article.'</p>
                        <p>'.Description article.'</p>
                        <p><button>Ajouter au panier</button></p>
                    </div>';
                variable incrément ++
            }

        }*/
    }
   Controller::getProductData();