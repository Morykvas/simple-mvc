
<?php 
define('CSS', '../../');
require_once 'header.php'; 
?>

<div class="container">
   <div class="wrapper-page-content">
         
      <h1><?= $data['title']; ?></h1>
      <div class="wrapper-product-cards">
         <?php foreach ($data['name'] as $product) : ?>
         <div class="wrapper-products-card">
         <span class="title-products"> <?= $product['product_name']; ?> </span> 
         <span class="desc-products"> <?= $product['product_description']; ?> </span>
         </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>
<?php require_once 'footer.php'; ?>
