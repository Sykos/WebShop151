<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category information</title>
    <link rel="stylesheet" type="text/css" href="src/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
</head>
    <body>
    <header class="header flex flex-jus-spa-aro">
        <h1>Category</h1>
        <div class="flex flex-dir-col ">
            <h5 class="pad-ex-sml"><a href="new-item.php" >Create new item</a></h5>
            <h5 class="pad-ex-sml"><a href="index.php">Logout</a></h5>
        </div>
    </header>
        <div >

            <?php 
            echo "<br><br>";
            $cid = $_POST['cid']; // getting the category id from categories
            
            if ($cid==1){?> <!--checking on which category was choosen according to the cid-->
                <h1 class="flex flex-center margin-all-ex-lar">Food categoty</h1>
            <?php }
            elseif($cid==2){?>
                <h1 class="flex flex-center margin-all-ex-lar">Drink categoty</h1>
            <?php }
            elseif($cid==3){?>
                <h1 class="flex flex-center margin-all-ex-lar">Shoes categoty</h1>
            <?php }
            else{?>
                <h1 class="flex flex-center margin-all-ex-lar">New categoty</h1>
            <?php }
            $dbervername = "127.0.0.1:49386"; //server name
            $dbUsername = "azure"; // user name to login to db
            $dbPassword = "6#vWHD_$" ; // password to login to db
            $dbName = "raclettev2" ; // db name
            $connection = mysqli_connect($dbervername,$dbUsername,$dbPassword,$dbName) ; //a connection to db func ('env/ip','user','pass' ,'db name')
            if (!$connection){ // if not able to connect to server user/pass/host is not correct gives message
                die ("could not connect to data base"); // message for wrong connection
            }
            $query = "SELECT * FROM item WHERE cnumber = $cid";
            $result = mysqli_query($connection,$query);
            while ($row = mysqli_fetch_array($result)) { ?>
            <hr>
                <form method="POST" action="item.php">
                    <div class="items margin-all-ex-lar">
                            <?php echo "<br>"; ?>
                            <button class="sub-btn" type="submit"  name="item" value="<?php echo $row['id']?>"><?php echo $row['name']; ?></button>
                            <span> : $<?php echo $row['price']; ?></span>
                    </div>
                </form>
               
            <?php } ?>

            <hr>
            
            <p class="flex flex-center margin-up-down-lar pad-sml">
                <a href="new-item.php" class="new-item bgc-blue pad-sml">Create new item</a>
            </p> 


        </div>
        <footer class="footer">
        <p class="flex flex-center">Copyright &copy; Solotech 2017</p>
        </footer>   
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>

    </body>
</html>