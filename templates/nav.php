<!-- NAV -->
<nav class="nav">

      <div class="hamburger-container">
          <ul class="hamburger">
                        <li></li>
                        <li></li>
              <li></li>
          </ul>
      </div>

      <ul id="menu">
                    <li><a href="?page=home">Home</a></li>
                    <li><a href="?page=product">Fromages</a></li>
                    <li><a href="#">Vin</a></li>
                    <li><a href="#">Four</a></li>
                    <li><a href="?page=admin">Administration</a></li>
                    <li><a href="?page=member">Modifier votre profile</a></li>
                    <?php
                        /*if(isset($_SESSION['loggedin'])){
                            echo '<li><a href="?page=member">Modifier votre profile</a></li>';
                        }*/
                    ?>
      </ul>

  </nav>

<!-- LIEN AVEC LA DB À FAIRE POUR REMPLIRE LES CHAMPS DES CATÉGORIES (DANS LE MAINCONTROLLER) -->
