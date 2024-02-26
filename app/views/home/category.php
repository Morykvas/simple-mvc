 
<?php
define('CSS', '../../../');
require 'header.php';
?>
<div class="container">
   <div class="wrapper-page-content">
      <h1>Сторінка категорій</h1>
         <h2><?= $data['title'];?></h2>
         <?php foreach ($data['products'] as $product) : ?>
            <div>
               <?= $product['product_name'];?>
               <?= $product['product_description'];?>
               <?= $product['product_price'];?>
            </div>
         <?php endforeach; ?>
   </div>
</div>

    
        
