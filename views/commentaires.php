<!--Code a utilisé lors de l'insértion de la partie "Commentaire" -->
<?php
  if(isset($_POST['submit_commentaire'])){
    if(isset($_POST['pseudo'], $_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire']))
    {
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $commentaire = htmlspecialchars($_POST['commentaire']);
      //Contrôle des champs vides

    }else{
      $c_erreur = "Tous les champs doivent être complétés";

    }
  }
?>
<!--Affichage du formulaire permettant d'ajouter un commentaire-->
<form method="POST">
    <input type="text" name="pseudo" placeholder="Votre pseudo"/></br>
    <textarea name="commentaire" placeholder="Votre commentaire"/></textarea></br>

    <input type ="submit" value="Poster mon commentaire" name="submit_commentaire"/>
</form>

<?php
  if(isset($c_erreur)) {echo "Erreur".$c_erreur;}
?>
