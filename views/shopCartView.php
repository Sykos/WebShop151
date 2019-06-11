<!DOCTYPE html>
<html lang='en' dir='ltr'>
    <head>
        <meta charset='utf-8'>
        <title><?php echo $this->aContent['pageTitle']; ?></title>
        <?php
        //CHARGE TOUTES LES PAGES JS

        foreach($this->aContent['js'] as $sJsPath)
        {
          echo '<script src='".$sJsPath."'></script>';
        }

        //CHARGE TOUTES LES PAGES CSS
        foreach($this->aContent['css'] as $sCssPath)
        {
            echo '<link rel="stylesheet" href='".$sCssPath."'>';
        }
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <form method='post' action='panier.php'>
                        <table style='width: 400px'>
                    	       <tr>
                    		        <td colspan='4'>Votre panier</td>
                    	        </tr>
                    	        <tr>
                    		        <td>Libellé</td>
                    		        <td>Quantité</td>
                    		        <td>Prix Unitaire</td>
                    		        <td>Action</td>
                    	        </tr>
                    	<?php
                    	if (Controller::creationPanier())
                    	{
                    	   $nbArticles=count($_SESSION['panier']['libelleProduit']);
                    	   if ($nbArticles <= 0)
                           {
                               echo '<tr><td>Votre panier est vide </ td></tr>';
                           }

                    	   else
                    	    {
                    	      for ($i=0 ;$i < $nbArticles ; $i++)
                    	      {
                    	         echo '<tr>';
                    	         echo '<td>'.htmlspecialchars($_SESSION['panier']['libelleProduit'][$i]).'</ td>';
                    	         echo '<td><input type="text" size="4" name="q[]"'.htmlspecialchars($_SESSION['panier']['qteProduit'][$i]).'/></td>';
                    	         echo '<td>'.htmlspecialchars($_SESSION['panier']['prixProduit'][$i]).'</td>';
                    	         echo '<td><a href="'.htmlspecialchars('panier.php?action=suppression&l='.rawurlencode($_SESSION['panier']['libelleProduit'][$i])).'">XX</a></td>';
                    	         echo '</tr>';
                    	      }

                    	      echo '<tr><td colspan="2"> </td>';
                    	      echo '<td colspan="2">';
                    	      echo 'Total : '.Controller::MontantGlobal();
                    	      echo '</td></tr>';

                    	      echo '<tr><td colspan="4">';
                    	      echo '<input type="submit" value="Rafraichir"/>';
                    	      echo '<input type="hidden" name="action" value="refresh"/>';

                    	      echo '</td></tr>';
                    	    }
                    	}
                    	?>
                        </table>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
