<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->aContent['pageTitle']; ?></title>

    <?php
    //CHARGE TOUTES LES PAGES CSS
    foreach($this->aContent['css'] as $sCssPath) {
      echo "<link rel='stylesheet' href='".$sCssPath."'>";
    }
    //CHARGE TOUTES LES PAGES JS
    foreach($this->aContent['js'] as $sJsPath){
      echo "<script src='".$sJsPath."'></script>";
    }
     ?>
  </head>
  
  <body>
  <form id="form1" name="form1" method="post" action="productView.php">
<label for="produitID">Produitid</label><input type="text" name="produitID" id="produitID" />
<br class="clear" /> 
<label for="ProduitSKU">Produitsku</label><input type="text" name="ProduitSKU" id="ProduitSKU" />
<br class="clear" /> 
<label for="ProduitNom">Produitnom</label><input type="text" name="ProduitNom" id="ProduitNom" />
<br class="clear" /> 
<label for="ProduitPrix">Produitprix</label><input type="text" name="ProduitPrix" id="ProduitPrix" />
<br class="clear" /> 
<label for="ProduitPoids">Produitpoids</label><input type="text" name="ProduitPoids" id="ProduitPoids" />
<br class="clear" /> 
<label for="ProduitCartDesc">Produitcartdesc</label><input type="text" name="ProduitCartDesc" id="ProduitCartDesc" />
<br class="clear" /> 
<label for="ProduitDescriptionCourte">Produitdescriptioncourte</label><input type="text" name="ProduitDescriptionCourte" id="ProduitDescriptionCourte" />
<br class="clear" /> 
<label for="ProduitDescriptionLongue">Produitdescriptionlongue</label><textarea name="ProduitDescriptionLongue" id="ProduitDescriptionLongue" cols="45" rows="5"></textarea>
<br class="clear" /> 
<label for="ProduitThumb">Produitthumb</label><input type="text" name="ProduitThumb" id="ProduitThumb" />
<br class="clear" /> 
<label for="ProduitImage">Produitimage</label><input type="text" name="ProduitImage" id="ProduitImage" />
<br class="clear" /> 
<label for="ProduitCategorieID">Produitcategorieid</label><input type="text" name="ProduitCategorieID" id="ProduitCategorieID" />
<br class="clear" /> 
<label for="ProduitMiseAJourDate">Produitmiseajourdate</label><input type="text" name="ProduitMiseAJourDate" id="ProduitMiseAJourDate" />
<br class="clear" /> 
<label for="ProduitStock">Produitstock</label><input type="text" name="ProduitStock" id="ProduitStock" />
<br class="clear" /> 
<label for="ProduitLive">Produitlive</label><input type="text" name="ProduitLive" id="ProduitLive" />
<br class="clear" /> 
<label for="ProduitInfini">Produitinfini</label><input type="text" name="ProduitInfini" id="ProduitInfini" />
<br class="clear" /> 
<label for="ProduitLocalisation">Produitlocalisation</label><input type="text" name="ProduitLocalisation" id="ProduitLocalisation" />
<br class="clear" /> 
</form>
    <?php
        require_once('./templates/header.php');
        require_once('./templates/nav.php');
        require_once('./templates/productBody.php');
        require_once('./templates/footer.php');
    ?>

  </body>
</html>
