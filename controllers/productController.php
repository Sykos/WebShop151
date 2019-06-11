
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
               /*echo "NOM :{$row['ProduitNom']}  <br> ".
                  "PRIX : {$row['ProduitPrix']} <br> ".
                  " DESC : {$row['ProduitCartDesc']} <br> ".
                  "--------------------------------<br>";*/


                   $result = mysql_query($sql); // This line executes the MySQL query that you typed above

                    $yourArray = array(); // make a new array to hold all your data
                    

                    $index = 0;
                    while($row = mysql_fetch_assoc($result)){ // loop to store the data in an associative array.
                     $yourArray[$index] = $row;
                     $index++;
                    return $yourArray;
}
                  
            }
            
            echo "Fetched data successfully\n";
            
            mysql_close($conn);
            
        
        }

        public static function createProduct()
        {
            session_start();
            include('db.php');
            $status="";
            if (isset($_POST['code']) && $_POST['code']!=""){
            $code = $_POST['code'];
            $result = mysqli_query(
            $con,
            "SELECT * FROM `products` WHERE `code`='$code'"
            );
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $code = $row['code'];
            $price = $row['price'];
            $image = $row['image'];
             
            $cartArray = array(
                $code=>array(
                'name'=>$name,
                'code'=>$code,
                'price'=>$price,
                'quantity'=>1,
                'image'=>$image)
            );
             
            if(empty($_SESSION["shopping_cart"])) {
                $_SESSION["shopping_cart"] = $cartArray;
                $status = "<div class='box'>Product is added to your cart!</div>";
            }else{
                $array_keys = array_keys($_SESSION["shopping_cart"]);
                if(in_array($code,$array_keys)) {
                $status = "<div class='box' style='color:red;'>
                Product is already added to your cart!</div>";	
                } else {
                $_SESSION["shopping_cart"] = array_merge(
                $_SESSION["shopping_cart"],
                $cartArray
                );
                $status = "<div class='box'>Product is added to your cart!</div>";
                }
             
                }
            }

        }
    }

    Controller::createProduct();
