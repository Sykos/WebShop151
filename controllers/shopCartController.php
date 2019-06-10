<?php
    class Controller extends mainController
    {
        public function __construct()
        {
            parent::__construct();

            $this->aContent['viewPath'] = './views/shopCartView.php';
            $this->aContent['pageTitle'] = 'Panier';
        }

        public function render()
        {
            parent::render();
        }

        /**
         * Verifie si le panier existe, le créé sinon
         * @return booleen
         */
        public static function creationPanier()
        {
            if (!isset($_SESSION['panier']))
            {
               $_SESSION['panier']=array();
               $_SESSION['panier']['libelleProduit'] = array();
               $_SESSION['panier']['qteProduit'] = array();
               $_SESSION['panier']['prixProduit'] = array();
               $_SESSION['panier']['verrou'] = false;
           }else
           {
               return true;
           }

        }

        /**
         * Ajoute un article dans le panier
         * @param string $libelleProduit
         * @param int $qteProduit
         * @param float $prixProduit
         * @return void
         */
         public static function ajouterArticle($libelleProduit, $qteProduit, $prixProduit)
         {
             //Si le panier existe
             if (creationPanier() && !isVerrouille())
             {
                //Si le produit existe déjà on ajoute seulement la quantité
                $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

                if ($positionProduit !== false)
                {
                   $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
                }
                else
                {
                   //Sinon on ajoute le produit
                   array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
                   array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
                   array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
                }
             }else
             {
                 echo "Un problème est survenu veuillez contacter l'administrateur du site.";
             }

         }

        /**
        * Modifie la quantité d'un article
        * @param $libelleProduit
        * @param $qteProduit
        * @return void
        */
        public static function modifierQTeArticle($libelleProduit, $qteProduit)
        {
            //Si le panier éxiste
            if (creationPanier() && !isVerrouille())
            {
               //Si la quantité est positive on modifie sinon on supprime l'article
               if ($qteProduit > 0)
                {
                  //Recharche du produit dans le panier
                  $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

                  if ($positionProduit !== false)
                  {
                     $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
                  }
                }else
                {
                    supprimerArticle($libelleProduit);
                }

            }else
            {
                echo "Un problème est survenu veuillez contacter l'administrateur du site.";
            }

        }

        /**
         * Supprime un article du panier
         * @param $libelleProduit
         * @return unknown_type
        */
        public static function supprimerArticle($libelleProduit)
        {
            //Si le panier existe
            if (creationPanier() && !isVerrouille())
            {
               //Nous allons passer par un panier temporaire
               $tmp=array();
               $tmp['libelleProduit'] = array();
               $tmp['qteProduit'] = array();
               $tmp['prixProduit'] = array();
               $tmp['verrou'] = $_SESSION['panier']['verrou'];

               for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
                {
                    if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
                    {
                        array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
                        array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
                        array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
                    }

                }
                //On remplace le panier en session par notre panier temporaire à jour
                $_SESSION['panier'] =  $tmp;
                //On efface notre panier temporaire
                unset($tmp);
            }else
            {
                echo "Un problème est survenu veuillez contacter l'administrateur du site.";
            }

        }

        /**
         * Montant total du panier
         * @return int
         */
        public static function montantGlobal()
        {
            $total=0;
            for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
            {
               $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
            }
            return $total;
        }

        /**
         * Fonction de suppression du panier
         * @return void
         */
        public static function supprimePanier()
        {
            unset($_SESSION['panier']);
        }

        /**
         * Permet de savoir si le panier est verrouillé
         * @return booleen
         */
        public static function isVerrouille()
        {
            if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
            {
                return true;
            }else
            {
                return false;
            }

        }

        /**
         * Compte le nombre d'articles différents dans le panier
         * @return int
         */
        public static function compterArticles()
        {
            if (isset($_SESSION['panier']))
            {
                return count($_SESSION['panier']['libelleProduit']);
            }else
            {
                return 0;
            }
        }
    }

##########################
#                        #
# TRAITEMENT DES DONNÉES #
#                        #
##########################

session_start();

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On verifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut etre un entier simple ou un tableau d'entier

   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);

}

if (!$erreur){
   switch($action){
      Case "ajout":
         Controller::ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         Controller::supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            Controller::modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}
