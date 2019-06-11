
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
                     echo "NOM :{$row['ProduitNom']}  <br> ".
                        "PRIX : {$row['ProduitPrix']} <br> ".
                        " DESC : {$row['ProduitCartDesc']} <br> ".
                        "--------------------------------<br>";
      
      
                         $result = mysql_query($sql); // This line executes the MySQL query that you typed above
      
                          $yourArray = array(); // make a new array to hold all your data
                          
      
                          $index = 0;
                          while($row = mysql_fetch_assoc($result)){ // loop to store the data in an associative array.
                           $yourArray[$index] = $row;
                           $index++;
                          return $yourArray;

                          
                        // start session
                        session_start();
 
                        // set page title
                        $page_title="Products";

                          // database connection and table name
                            private $table_name="produits";
                        
                            // object properties
                            public $produitID;
                            public $ProduitNom ;
                            public $ProduitPrix ;
                            public $ProduitCartDesc ;

                            // constructor
                            public function __construct($db){
                                $this->conn = $db;

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                 
                                    // creating box
                                    echo "<div class='col-md-4 m-b-20px'>";
                                 
                                        // product id for javascript access
                                        echo "<div class='product-id display-none'>{$produitID}</div>";
                                 
                                        echo "<a href='product.php?id={$produitID}' class='product-link'>";
                                            // select and show first product image
                                            $product_image->product_id=$produitID;
                                            $stmt_product_image=$product_image->readFirst();
                                 
                                            while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
                                                echo "<div class='m-b-10px'>";
                                                    echo "<img src='uploads/images/{$row_product_image['name']}' class='w-100-pct' />";
                                                echo "</div>";
                                            }
                                 
                                            // product name
                                            echo "<div class='product-name m-b-10px'>{$ProduitNom}</div>";
                                        echo "</a>";
                                 
                                        // add to cart button
                                        echo "<div class='m-b-10px'>";
                                            if(array_key_exists($produitID, $_SESSION['cart'])){
                                                echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
                                                    echo "Update Cart";
                                                echo "</a>";
                                            }else{
                                                echo "<a href='add_to_cart.php?id={$produitID}&page={$page}' class='btn btn-primary w-100-pct'>Add to Cart</a>";
                                            }
                                        echo "</div>";
                                 
                                    echo "</div>";
            
                       
 

         }           
     }
  }
}
    Controller::createProduct();
