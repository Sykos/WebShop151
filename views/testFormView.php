  </head>
  <body>
	
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <?php require_once('./templates/header.php'); ?>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <? require_once('./templates/nav.php'); ?>
              </div>
          </div>

          <div class="row">
              <div class="col-md-12">
                  <!-- INSERT BODY -->
				   <form action="/views/config.php" method="POST">
                      Nom: <input type="text" name="nom" value="">
                      Prénom: <input type="text" name="prenom" value="">
                      E-mail: <input type="text" name="mail" value="">
                      Mot de Passe : <input type="password" name="pass" value="">
                      <input type="submit" name="submit" value="">
                  </form>
              </div>
          </div>

          <div class="row">
              <div class="col-md-12">
                 <?php require_once('./templates/footer.php'); ?>
              </div>
          </div>

      </div>









  </body>
</html>
