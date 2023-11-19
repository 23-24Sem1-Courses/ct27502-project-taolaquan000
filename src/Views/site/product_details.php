<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Chi tiết sản phẩm</title>
   <script src="/js/site/jquery-3.6.3.min.js"></script>
   <script src="/js/site/bootstrap.min.js"></script>
   <link rel="stylesheet" href="/css/site/bootstrap.min.css">
   <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap"
      rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="/css/site/style.css">
   <link rel="stylesheet" href="/css/site/product.css">
</head>

<body>
   <!-- header -->
   <header id="header">
      <!-- header top -->
      <div class="header__top">
         <div class="container">
            <section class="row flex">
               <div class="col-lg-5 col-md-0 col-sm-0 heade__top-left">
                  <span>ComicBooks - Kho tàng truyện tranh</span>
               </div>

               <nav class="col-lg-7 col-md-0 col-sm-0 header__top-right">
                  <ul class="header__top-list">
                     <li class="header__top-item">
                        <a href="#" class="header__top-link">

                           Hỏi đáp</a>
                     </li>
                     <li class="header__top-item">
                        <a href="#" class="header__top-link">Hướng dẫn</a>
                     </li>
                     <?php if (isset($_SESSION['username'])): ?>
                     <div class="dropdown ml-5">
                        <a class="dropdown-toggle text-white" data-toggle="dropdown">
                           <?=$_SESSION['username']['username']?>
                        </a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="#">Tài khoản</a>
                           <a class="dropdown-item" href="/myorder">Đơn hàng của tôi</a>
                           <a class="dropdown-item" href="/logout">Đăng xuất</a>
                        </div>
                     </div>
                     <?php else: ?>
                     <li class="header__top-item">
                        <a href="/register" class="header__top-link">Đăng ký</a>
                     </li>
                     <li class="header__top-item">
                        <a href="/login" class="header__top-link">Đăng nhập</a>
                     </li>
                     <?php  endif;?>
                  </ul>
               </nav>
            </section>
         </div>
      </div>
      <!--end header top -->

      <!-- header bottom -->
      <div class="header__bottom">
         <div class="container">
            <section class="row">
               <div class="col-lg-3 col-md-4 col-sm-12 header__logo">
                  <h1 class="header__heading">
                     <a href="#" class="header__logo-link">
                        <img src="/images1/logo2.png" alt="Logo" class="header__logo-img">
                     </a>
                  </h1>
               </div>

               <div class="col-lg-6 col-md-7 col-sm-0 header__search">
                  <select name="" id="" class="header__search-select">
                     <option value="0">All</option>
                     <option value="1">Sách tiếng việt</option>
                     <option value="2">Sách nước ngoài</option>
                     <option value="3">Manga-Comic</option>

                  </select>
                  <input type="text" class="header__search-input" placeholder="Tìm kiếm tại đây...">
                  <button class="header__search-btn">
                     <div class="header__search-icon-wrap">
                        <i class="fas fa-search header__search-icon"></i>
                     </div>
                  </button>
               </div>

               <div class="col-lg-2 col-md-0 col-sm-0 header__call">
                  <div class="header__call-icon-wrap">
                     <i class="fas fa-phone-alt header__call-icon"></i>
                  </div>
                  <div class="header__call-info">
                     <div class="header__call-text">
                        Gọi điện tư vấn
                     </div>
                     <div class="header__call-number">
                        033.7691.013
                     </div>
                  </div>
               </div>
               <?php 
                     $count=0;
                     if(isset($_SESSION['cart']))
                     {
                        $count=count($_SESSION['cart']);
                     }
                  ?>
               <a href="/cart" class="col-lg-1 col-md-1 col-sm-0 header__cart">
                  <div class="header__cart-icon-wrap">
                     <span class="header__notice"><?=$count?></span>
                     <i class="fas fa-shopping-cart header__nav-cart-icon"></i>
                  </div>
               </a>
            </section>
         </div>
      </div>
      <!--end header bottom -->

      <!-- header nav -->
      <div class="header__nav">
         <div class="container">
            <section class="row">
               <div class="header__nav-menu-wrap col-lg-3 col-md-0 col-sm-0">
                  <i class="fas fa-bars header__nav-menu-icon"></i>
                  <div class="header__nav-menu-title">Danh mục sản phẩm</div>
               </div>

               <div class="header__nav col-lg-9 col-md-0 col-sm-0">
                  <ul class="header__nav-list">
                     <li class="header__nav-item">
                        <a href="/" class="header__nav-link">Trang chủ</a>
                     </li>
                     <li class="header__nav-item">
                        <a href="/product" class="header__nav-link">Sản phẩm</a>
                     </li>
                     <li class="header__nav-item">
                        <a href="/contact" class="header__nav-link">Liên hệ</a>
                     </li>
                  </ul>
               </div>
            </section>
         </div>
      </div>
   </header>
   <!--end header nav -->
   <!-- score-top-->

   <button onclick="topFunction()" id="myBtn-scroll" title="Go to top"><i class="fas fa-chevron-up"></i></button>
   <!-- product -->
   <section class="product">
      <div class="container">
         <div class="row bg-white pt-4 pb-4 border-bt pc">
            <nav class="menu__nav col-lg-3 col-md-12 col-sm-0">
               <ul class="menu__list">
                  <li class="menu__item menu__item--active">
                     <a href="#" class="menu__link">
                        <img src="/images1/item/baby-boy.png" alt="" class="menu__item-icon" id="Capa_1"
                           enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512">
                        Sách Tiếng Việt</a>
                  </li>
                  <li class="menu__item">
                     <a href="#" class="menu__link">
                        <img src="/images1/item/translation.png" alt="" class="menu__item-icon" id="Capa_1"
                           enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512">
                        Sách nước ngoài</a>
                  </li>

                  <li class="menu__item">
                     <a href="#" class="menu__link">
                        <img src="/images1/item/1380754_batman_comic_hero_superhero_icon.png" alt=""
                           class="menu__item-icon" viewBox="0 0 512 512" width="1012" height="512">

                        Manga - Comic</a>
                  </li>

               </ul>
            </nav>

            <article class="product__main col-lg-9 col-md-12 col-sm-12">
               <div class="row">
                  <div class="product__main-img col-lg-4 col-md-4 col-sm-12">
                     <div class="product__main-img-primary">
                        <img src="/<?=$book->image?>">
                     </div>
                  </div>

                  <div class="product__main-info col-lg-8 col-md-8 col-sm-12">
                     <div class="product__main-info-breadcrumb">
                        Trang chủ / Sản phẩm
                     </div>

                     <a href="#" class="product__main-info-title">
                        <h2 class="product__main-info-heading">
                           <?=$book->title?>
                        </h2>
                     </a>

                     <div class="product__main-info-rate-wrap">
                        <i class="fas fa-star product__main-info-rate"></i>
                        <i class="fas fa-star product__main-info-rate"></i>
                        <i class="fas fa-star product__main-info-rate"></i>
                        <i class="fas fa-star product__main-info-rate"></i>
                        <i class="fas fa-star product__main-info-rate"></i>
                     </div>

                     <div class="product__main-info-price">
                        <span class="product__main-info-price-current">
                        <?=currency_format($book->price)?>
                        </span>
                     </div>

                     <div class="product__main-info-description">
                     <?=nl2br($book->description)?>
                     </div>

                     <div class="product__main-info-cart">
                        <!--<div class="product__main-info-cart-quantity">
                                    <input type="button" value="-"  class="product__main-info-cart-quantity-minus">
                                    <input type="number" step="1" min="1" max="999" value="1" class="product__main-info-cart-quantity-total">
                                    <input type="button" value="+" class="product__main-info-cart-quantity-plus">
                              </div>-->
                        <form action="/addcart/<?=$book->id?>">
                           <div class="product__main-info-cart-btn-wrap">
                              <button class="product__main-info-cart-btn" type="submit">
                                 Thêm vào giỏ hàng
                              </button>
                           </div>
                        </form>
                     </div>

                     <div class="product__main-info-contact">
                        <a href="#" class="product__main-info-contact-fb">
                           <i class="fab fa-facebook-f"></i>
                           Chat Facebook
                        </a>
                        <div class="product__main-info-contact-phone-wrap">
                           <div class="product__main-info-contact-phone-icon">
                              <i class="fas fa-phone-alt "></i>
                           </div>

                           <div class="product__main-info-contact-phone">
                              <div class="product__main-info-contact-phone-title">
                                 Gọi điện tư vấn
                              </div>
                              <div class="product__main-info-contact-phone-number">
                                 ( 033.7691.013)
                              </div>
                           </div>

                        </div>

                     </div>
                  </div>
               </div>
            </article>

            <aside class="product__aside col-lg-3 col-md-0 col-sm-0">
               <div class="product__aside-bottom">
                  <h3 class="product__aside-heading">
                     Có thể bạn thích
                  </h3>

                  <div class="product__aside-list">
                  <?php  foreach ($user_like as $book):?>
                     <div class="product__aside-item product__aside-item--border">
                        <div class="product__aside-img-wrap">
                           <img src="/<?=$book->image?>" class="product__aside-img">
                        </div>
                        <div class="product__aside-title">
                           <a href="/product_details/<?= $book->id?>" class="product__aside-link">
                              <h4 class="product__aside-link-heading"><?=$book->title?></h4>
                           </a>

                           <div class="product__aside-rate-wrap">
                              <i class="fas fa-star product__aside-rate"></i>
                              <i class="fas fa-star product__aside-rate"></i>
                              <i class="fas fa-star product__aside-rate"></i>
                              <i class="fas fa-star product__aside-rate"></i>
                              <i class="fas fa-star product__aside-rate"></i>
                           </div>

                           <div class="product__aside-price">
                              <span class="product__aside-price-current">
                              <?=currency_format($book->price)?>
                              </span>
                           </div>
                        </div>
                     </div>
                     <?php endforeach; ?>
                  </div>
               </div>
            </aside>
         </div>

         <section class="product__love col-12 mt-4">
            <div class="row bg-white">
               <div class="col-lg-12 col-md-12 col-sm-12 product__love-title">
                  <h2 class="product__love-heading">
                     Sản phẩm tương tự
                  </h2>
               </div>
            </div>
            <div class="row bg-white">
            <?php  foreach ($similar_product as $book):?>
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
               <?php endforeach; ?>
            </div>
         </section>
      </div>
   </section>
   <!--product -->

   <!-- footer -->
   <footer>
      <section class="footer__top">
         <div class="container">
            <div class="row">
               <article class="footer__top-intro col-lg-5 col-md-4 col-sm-6">
                  <h4 class="footer__top-intro-heading">
                     Về chúng tôi
                  </h4>
                  <div class="footer__top-intro-content">
                  ComicBooks là cửa hàng luôn cung cấp truyện tranh cho giới trẻ .Chúng tôi sẽ liên tục cập
                  nhật những cuốn sách hay nhất, mới nhất. <br> <br>
                     Điện thoại: 033.7691.013 <br>
                     Email: qnd2023@gmail.com <br>
                     Zalo: 033.7691.013 <br>
                  </div>
               </article>

               <article class="footer__top-policy col-lg-3 col-md-4 col-sm-6">
                  <h4 class="footer__top-policy-heading">
                     Chính sách mua hàng
                  </h4>

                  <ul class="footer__top-policy-list">
                     <li class="footer__top-policy-item">
                        <a href="#" class="footer__top-policy-link">Hình thức đặt hàng</a>
                     </li>
                     <li class="footer__top-policy-item">
                        <a href="#" class="footer__top-policy-link">Hình thức thanh toán</a>
                     </li>
                     <li class="footer__top-policy-item">
                        <a href="#" class="footer__top-policy-link">Phương thức vận chuyển</a>
                     </li>
                     <li class="footer__top-policy-item">
                        <a href="#" class="footer__top-policy-link">Chính sách đổi trả</a>
                     </li>
                     <li class="footer__top-policy-item">
                        <a href="#" class="footer__top-policy-link">Hướng dẫn sử dụng</a>
                     </li>
                  </ul>
               </article>

               <article class="footer__top-contact-wrap col-lg-4 col-md-4 col-sm-6">
                  <h4 class="footer__top-contact-heading">
                     Hotline liên hệ
                  </h4>

                  <div class="footer__top-contact">
                     <div class="footer__top-contact-icon">
                        <img src="/images/phone_top.png" class="footer__top-contact-img">
                     </div>

                     <div class="footer__top-contact-phone-wrap">
                        <div class="footer__top-contact-phone">
                           033.7691.013
                        </div>
                        <div class="footer__top-contact-des">
                           (Giải đáp thắc mắc 24/24)
                        </div>
                     </div>
                  </div>

                  <h4 class="footer__top-contact-heading">
                     Kết nối với chúng tôi
                  </h4>

                  <div class="footer__top-contact-social">
                     <a href="#" class="footer__top-contact-social-link">
                        <img src="/images/facebook.png">
                     </a>
                     <a href="#" class="footer__top-contact-social-link">
                        <img src="/images/youtube.png">
                     </a>
                     <a href="#" class="footer__top-contact-social-link">
                        <img src="/images/tiktok.png">
                     </a>
                     <a href="#" class="footer__top-contact-social-link">
                        <img src="/images/zalo.png">
                     </a>
                  </div>
               </article>
            </div>
         </div>
      </section>
      <section class="footer__bottom">
         <div class="container">
            <div class="row">
               <span class="footer__bottom-content">@Bản quyền thuộc về QND | Thiết kế bởi QND </span>
            </div>
         </div>
      </section>
   </footer>
   <!-- end footer -->

   <script src="/js/site/jquery-3.6.3.min.js"></script>
   <script src="/js/site/jq.js"></script>
   <script src="/js/site/index.js"></script>
   <script src="/js/site/popper.min.js"></script>
   <script src="/js/site/bootstrap.bundle.min.js"></script>

</body>

</html>