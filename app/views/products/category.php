 
<?php
define('CSS', '../../../');
require_once($_SERVER['DOCUMENT_ROOT'] . '/simple-mvc/app/views/header.php');
?>
<div class="container">
   <div class="wrapper-page-content">
      <h1>Сторінка категорій</h1>
      
      <h2 class="category_title"><?= $data['title']; ?></h2>
      <div class="wrapper-product-cards">
         <?php foreach ($data['products'] as $product) : ?>
            <div class="wrapper-products-card">
               <span class="title-products"><?= $product['product_name'];?></span>
               <span class="desc-products"> <?= $product['product_description'];?></span>
               <span class="desc-products"><?= $product['product_price'];?><span> грн</span></span>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/simple-mvc/app/views/footer.php'); ?>

        
