<!-- slide - menu list -->
<?php if(isset($order_error))
      echo '<script>alert("'.$order_error.'")</script>';
      if(isset($order_success))
      echo '<script>alert("'.$order_success.'")</script>';
?>
<section class="menu-slide">
   <div class="container">
      <div class="row">  
      <nav class="menu__nav col-lg-3 col-md-12 col-sm-0">
            <ul class="menu__list">
            <?php foreach ($categories as $category): ?> 
               <li class="menu__item menu__item--active">
                  <a href="#" class="menu__link">
                     <!-- <img src="images1/item/baby-boy.png" alt="" class="menu__item-icon" id="Capa_1"
                        enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512"> -->
                        <?=$category->name?></a>
               </li>
               <?php endforeach;?>
            </ul>
         </nav>

         <div class="slider col-lg-9 col-md-12 col-sm-0">
            <div class="row">
               <div class="slide__left col-lg-8 col-md-0 col-sm-0">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                     <!-- <ol class="carousel-indicators">
                                 <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                 <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                 <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              </ol> -->
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <img src="images1/banner/363488_final1511.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                           <img src="images1/banner/Gold_DongA_600X350.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                           <img src="images1/banner/megabook-glod600X350.png" class="d-block w-100" alt="...">
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                     </a>
                  </div>
                  <div class="slide__left-bottom">
                     <div class="slide__left-botom-one">
                        <img src="images1/banner/363107_05.jpg" class="slide__left-bottom-one-img">
                     </div>
                     <div class="slide__left-bottom-two">
                        <img src="images1/banner/363104_06.jpg" class="slide__left-bottom-tow-img">
                     </div>
                  </div>
               </div>

               <div class="slide__right col-lg-4 col-md-0 col-sm-0">
                  <img src="images1/banner/slider-right.png" class="slide__right-img">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end slide menu list -->
<!-- score-top-->

<button onclick="topFunction()" id="myBtn-scroll" title="Go to top"><i class="fas fa-chevron-up"></i></i></button>
<!-- bestselling product -->
<section class="bestselling">
   <div class="container">
      <div class="row">
         <div class="bestselling__heading-wrap">
            <img src="images/bestselling.png" alt="Sản phẩm bán chạy" class="bestselling__heading-img">
            <div class="bestselling__heading">Sản phẩm mới</div>
         </div>
      </div>

      <section class="row">
      <?php foreach ($books_new as $book):?>
         <div class="bestselling__product col-lg-4 col-md-6 col-sm-12">
            <div class="bestselling__product-img-box">
               <img src="/<?=$book->image?>" alt=""
                  class="bestselling__product-img">
            </div>
            <div class="bestselling__product-text">
               <h3 class="bestselling__product-title">
                  <a href="/product_details/<?= $book->id?>" class="bestselling__product-link"><?=$book->title?></a>
               </h3>

               <div class="bestselling__product-rate-wrap">
                  <i class="fas fa-star bestselling__product-rate"></i>
                  <i class="fas fa-star bestselling__product-rate"></i>
                  <i class="fas fa-star bestselling__product-rate"></i>
                  <i class="fas fa-star bestselling__product-rate"></i>
                  <i class="fas fa-star bestselling__product-rate"></i>
               </div>

               <span class="bestselling__product-price">
               <?=currency_format($book->price)?>
               </span>

               <div class="bestselling__product-btn-wrap">
                  <button class="bestselling__product-btn">Xem hàng</button>
               </div>
            </div>
         </div>
         <?php endforeach;?>
      </section>
      <div class="row bestselling__banner">

         <div class="bestselling__banner-left col-lg-6">
            <img src="images1/banner/920x420_phienchodocu.png" alt="Banner quảng cáo"
               class="bestselling__banner-left-img">
         </div>
         <div class="bestselling__banner-right col-lg-6">
            <img src="images1/banner/muonkiepnhansinh_resize_920x420.jpg" alt="Banner quảng cáo"
               class="bestselling__banner-right-img">
         </div>
      </div>
   </div>
</section>

<section class="product">
   <div class="container">
      <div class="row">
         <aside class="product__sidebar col-lg-2 col-md-0 col-sm-12">
         </aside>
         <article class="product__content col-lg-9 col-md-12 col-sm-12">
         <div class="product__sidebar-heading">
               <div class=""></div>
               <h2 class="product__sidebar-title text-center">
                  <img src="images1/item/1380754_batman_comic_hero_superhero_icon.png" alt="" class="menu__item-icon"
                     id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512">
                  Manga - Comic
               </h2>
            </div>

            <div class="row product__panel">
            <?php foreach ($books_manga as $book):?>
               <div class="mb-4 col-lg-3 col-md-4 col-sm-6">
                  <div class="product__panel-item-wrap">
                     <div class="product__panel-img-wrap">
                        <img src="/<?=$book->image?>" alt=""
                           class="product__panel-img">
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
               </div>
            <?php endforeach;?>
         </article>
      </div>
   </div>
</section>
<!--end product -->

<!-- product love -->
<section class="product__love">
   <div class="container">
      <div class="row bg-white">
         <div class="col-lg-12 col-md-12 col-sm-12 product__love-title">
            <h2 class="product__love-heading">
               Có thể bạn thích
            </h2>
         </div>
      </div>
      <div class="row bg-white">
         <?php foreach ($books_like as $book):?>
         <div class="col-lg-2 col-md-3 col-sm-6">
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
         <?php endforeach;?>
      </div>
   </div>
</section>
<div class="mb-5"></div>
