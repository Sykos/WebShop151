<?php $title = "Products" ; ?>

<?php ob_start(); ?>

<?php require ("view/headerView.php"); ?>
<?php require ("view/navView.php"); ?>

<?php require ("view/footerView.php"); ?>

<?php $content = ob_get_contents(); ?>

<main class="container">
 
  <!-- Left Column / Raclette Image -->
  <div class="left-column">
    <img data-image="black" src="public/images/couille3.jpg" alt="">
    <img data-image="blue" src="public/images/couille4.jpg" alt="">
    <img data-image="red" class="active" src="public/images/couille5.jpg" alt="">
  </div>
 
 
  <!-- Right Column -->
  <div class="right-column">
 
    <!-- Product Description -->
    <div class="product-description">
      <span>Raclette</span>
      <h1>Du pays</h1>
      <p>La meilleure raclette, signée raclette.vs</p>
    </div>
 
    <!-- Product Configuration -->
    <div class="product-configuration">
 
      <!-- Product Color -->
      <div class="product-color">
        <span>Color</span>
 
        <div class="color-choose">
          <div>
            <input data-image="red" type="radio" id="red" name="color" value="red" checked>
            <label for="red"><span></span></label>
          </div>
          <div>
            <input data-image="blue" type="radio" id="blue" name="color" value="blue">
            <label for="blue"><span></span></label>
          </div>
          <div>
            <input data-image="black" type="radio" id="black" name="color" value="black">
            <label for="black"><span></span></label>
          </div>
        </div>
 
      </div>
 
      <!-- Cable Configuration -->
      <div class="cable-config">
        <span>Fromage Configuration</span>
 
        <div class="cable-choose">
          <button>Vache</button>
          <button>Chèvre</button>
          <button>Autre</button>
        </div>
 
        <a href="#">Comment choisir son fromage</a>
      </div>
    </div>
 
    <!-- Product Pricing -->
    <div class="product-price">
      <span>148CHF</span>
      <a href="#" class="cart-btn">Ajouter au panier</a>
    </div>
  </div>
</main>