<?php
define('CSS', '../../../');
require_once 'header.php'; 
?>

<div class="container">
      <div class="wrapper-page-content">
      <h1><?php  echo $data['title']; ?></h1>
            <div class="wrapper-product-cards">
                  <div class="wrapper-products-card">
                  <span class="title-products"> <?= $data['name']['product_name']; ?> </span> 
                  <span class="desc-products"> <?= $data['name']['product_description']; ?> </span>
            </div>
      </div>
</div>

<?php require_once 'footer.php'; ?>
   