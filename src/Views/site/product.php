<?php foreach ($categories as $category):?>
<section class="product__love">
   <div class="container">
      <div class="row bg-white">
         <div class="col-lg-12 col-md-12 col-sm-12 product__love-title">
            <h2 class="product__love-heading upper">
               <?=$category->name?>
            </h2>
         </div>
      </div>
      <div class="row bg-white">
         <?php  foreach ($books as $book):
            if ($book->category_id == $category->id):   
         ?>
            
            <div class=" col-lg-2 col-md-3 col-sm-6">
               <div class="product__panel-img-wrap">
                  <img src="/<?=$book->image?>" alt="" class="product__panel-img">
               </div>
               <h3 class="product__panel-heading">
                  <a href="/product_details/<?= $book->id?>" class="product__panel-link"><?=$book->title?></a>
               </h3>
               <div class="product__panel-rate-wrap">
                  <i class="fas fa-star product__panel-rate"></i>
                  <i class="fas fa-star product__panel-rate"></i>
                  <i class="fas fa-star product__panel-rate"></i>
                  <i class="fas fa-star product__panel-rate"></i>
                  <i class="fas fa-star product__panel-rate"></i>
               </div>

               <div class="product__panel-price">
                  <span class="product__panel-price-current">
                     <?=currency_format($book->price)?>
                  </span>
               </div>
            </div>
         <?php endif;
         endforeach; ?>
      </div>
   </div>
</section>
<?php endforeach ?>