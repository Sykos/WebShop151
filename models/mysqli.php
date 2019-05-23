
<?php
$currency = 'Chf'; //Currency Character or code

$db_username = 'azure';
$db_password = '6#vWHD_$';
$db_name = 'raclettev2';
$db_host = '127.0.0.1:49386';

$shipping_cost      = 1.50; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 12, 
                            'Service Tax' => 5
                            );						
//connect to MySql						
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>