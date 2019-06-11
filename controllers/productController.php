
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
    
                  
     }
            

        public static function createProduct()
        {
                  //RÉCUPÉRATION DES DONNÉES RELATIVES AU PRODUIT À AFFICHER
    
                  $dbhost = '127.0.0.1:49386';
                  $dbuser = 'azure';
                  $dbpass = '6#vWHD_$';
                  
                  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
      
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
                      //Test
                    /* echo "NOM :{$row['ProduitNom']}  <br> ".
                        "PRIX : {$row['ProduitPrix']} <br> ".
                        " DESC : {$row['ProduitCartDesc']} <br> ".
                        "--------------------------------<br>";*/
                        $nom = $row['ProduitNom'];
                        $prix = $row['ProduitPrix'];
                        $desc = $row['ProduitCartDesc'];
                      
      
      
                         $result = mysql_query($sql); // This line executes the MySQL query that you typed above
      
                          $yourArray = array(); // make a new array to hold all your data
                          
      
                          $index = 0;
                          while($row = mysql_fetch_assoc($result)){ // loop to store the data in an associative array.
                           $yourArray[$index] = $row;
                           $index++;
                          return $yourArray;
                        
                          ?>
                          <!doctype html>
                          <html lang="en">
                          <body>
                          <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h5 class="card-title">{{$nom['ProduitNom']}}</h5>
                        </div>
                        <div class="col-md-5 text-right">
                            <p class="card-text">Price ${{$prix['ProduitPrix']}}</p>
                        </div>
                          </body>
                          </html>
                          <?php

         }           
     }
  }
}
    Controller::createProduct();
