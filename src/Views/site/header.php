<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?=$title?></title>
   <script src="js/site/jquery-3.6.3.min.js"></script>
   <script src="js/site/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/site/bootstrap.min.css">
   <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap"
      rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/site/style.css">
   <link rel="stylesheet" href="css/site/home.css">
   <link rel="stylesheet" href="css/site/contact.css">
</head>

<body>
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
                           <img src="images1/logo2.png" alt="Logo" class="header__logo-img">
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