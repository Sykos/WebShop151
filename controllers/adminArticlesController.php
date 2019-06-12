<?php
    class Controller extends mainController
    {
        public function __construct(){
            parent::__construct();

            $this->aContent['viewPath'] = './views/adminArticlesView.php';
            $this->aContent['pageTitle'] = 'Administration';
        }

        public function render()
        {
            parent::render();
        }

        public static function getArticle($db, $nb =null, $is =null){
          if($nb AND !id){
            $req = $db->query('SELECT = FROM article LIMIT'-$nb);
            $req->fetchAll();
          }elseif($id){
            $req = $db->query('SELECT = FROM article WHERE id='.$id);
            $artciles = $req-> fetchObject();

          }else{
              $req = $db->query('SELECT = FROM article');
              $articles = $req->fetchAll();
          }
          return $articles;
        }

        public static function delArticle()
        {
              if (isset($_SESSION['admin']) AND !empty($_SESSION['admin'])){
                if(isset($_GET['id'])){
                  if
                  $req = $db->query('DELETE FROM article WHERE id ='-$_GET['id']);
                }
              }else{
                header('location:?page=admin');
              }
        }
    }
