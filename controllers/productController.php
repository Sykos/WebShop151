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
    
            $dbhost = '127.0.0.1:49386';
            $dbuser = 'azure';
            $dbpass = '6#vWHD_$';
            
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            $prodName = array();
            $prodPrix = array();
            $prodDesc = array();
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            $sql = 'SELECT ProduitNom, ProduitPrix, ProduitCartDesc FROM produits';
            mysql_select_db('raclettev2');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not get data: ' . mysql_error());
            }
            
            while($row = mysql_fetch_assoc($retval)) {
               /*echo "NOM :{$row['ProduitNom']}  <br> ".
                  "PRIX : {$row['ProduitPrix']} <br> ".
                  " DESC : {$row['ProduitCartDesc']} <br> ".
                  "--------------------------------<br>";*/

                   $prodName = $row["userid"];
                   $prodPrix =$row["fullname"];
                   $prodDesc =$row["userstatus"];
                  
            }
            
            echo "Fetched data successfully\n";
            
            mysql_close($conn);
            
        
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