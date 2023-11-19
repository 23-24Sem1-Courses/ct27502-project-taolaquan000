<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đặt hàng</title>
   <script src="/js/site/jquery-3.6.3.min.js"></script>
   <script src="/js/site/bootstrap.min.js"></script>
   <link rel="stylesheet" href="/css/site/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap"
      rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="/css/site/style.css">
   <link rel="stylesheet" href="/css/site/cart.css">
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
                        <img src="images1/logo1.png" alt="Logo" class="header__logo-img">
                     </a>
                  </h1>
               </div>

               <div class="col-lg-6 col-md-7 col-sm-0 header__search">
                  <select name="" id="" class="header__search-select">
                     <option value="0">All</option>
                     <option value="1">Sách tiếng việt</option>
                     <option value="2">Sách sách nước ngoài</option>
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
                        039.882.3232
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

   <button onclick="topFunction()" id="myBtn-scroll" title="Go to top"><i class="fas fa-chevron-down"></i></button>
   <!-- cart -->
   <section class="cart">
      <div class="container">
         <form action="/PlaceOrder" method="post">
         <article class="row mt-5">
            <div class="col-12">
               <h1>Thông tin người đặt</h1>
            </div>
         </article>
         <article class="row cart__head pc w-50 mb-5">
            <div class="col-6 cart__head-name">
               Tên đầy đủ:
            </div>
            <div class="col-6 cart__head-quantity">
               <input type="text" name="fullname">
            </div>
            <div class="col-6 cart__head-name mt-2">
               Địa chỉ:
            </div>
            <div class="col-6 cart__head-quantity mt-2">
               <input type="text" name="address">
            </div>
            <div class="col-6 cart__head-name mt-2">
               Số điện thoại:
            </div>
            <div class="col-6 cart__head-quantity mt-2">
               <input type="text" name="phone">
            </div>
         </article>
         <article class="row ">
            <div class="col-12 ">
               <h1>Giỏ hàng</h1>
            </div>
         </article>
         <?php  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){?>
         <article class="row cart__head pc">
            <div class="col-6 cart__head-name">
               Thông tin sản phẩm
            </div>
            <div class="col-6 cart__head-price">
               Đơn giá
            </div>
         </article>

         <?php 
               var_dump($myorder);
               $stt=1;
               $total=0;
               foreach ($_SESSION['cart'] as $cart):
               $subtotal = $cart['quantity'] * $cart['price'];
               $total += $subtotal;
         ?>
            <article class="row cart__body">
               <div class="col-6 cart__body-name">
                  <div class="cart__body-name-img">
                     <img src="/<?=$cart['image']?>">
                  </div>
                  <a href="" class="cart__body-name-title">
                     <?=$cart['title']?>
                  </a>
               </div>
               <div class="col-6 cart__body-price">
                  <span><?=currency_format($subtotal)?></span>
               </div>
            </article>
         <?php    
               $stt++;
               endforeach;}
         ?>

         <article class="row cart__foot">
            <div class="col-6 col-lg-6 col-sm-6 cart__foot-update">
               <!-- <button class="cart__foot-update-btn">Cập nhật giỏ hàng</button> -->
            </div>

            <p class="col-3 col-lg-3 col-sm-3 cart__foot-total">
               Tổng cộng:
            </p>

            <span class="col-3 col-lg-3 col-sm-3 cart__foot-price">
               <?=currency_format($total)?> <br>
               <button class="cart__foot-price-btn" type="submit">Đặt hàng</button>
            </span>
            </form>
      </div>
   </section>
   <!--end cart -->

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
                        <img src="images/phone_top.png" class="footer__top-contact-img">
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
                        <img src="images/facebook.png">
                     </a>
                     <a href="#" class="footer__top-contact-social-link">
                        <img src="images/youtube.png">
                     </a>
                     <a href="#" class="footer__top-contact-social-link">
                        <img src="images/tiktok.png">
                     </a>
                     <a href="#" class="footer__top-contact-social-link">
                        <img src="images/zalo.png">
                     </a>
                  </div>
               </article>
            </div>
         </div>
      </section>
      <section class="footer__bottom">
         <div class="container">
            <div class="row">
               <span class="footer__bottom-content">@Bản quyền thuộc về QND | Thiết kế bởi QND</span>
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