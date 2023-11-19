<?php

      //product
$router->get('/', 'App\Controllers\HomeController@index');
$router->get('/product', 'App\Controllers\HomeController@showProduct');
$router->get('/product_details/(\d+)', 'App\Controllers\HomeController@showProductDetails');
      //cart
$router->get('/cart', 'App\Controllers\HomeController@showCart');
$router->get('/addcart/(\d+)', 'App\Controllers\CartController@AddCart');
$router->post('/increase/(\d+)','App\Controllers\CartController@increase');
$router->post('/decrease/(\d+)','App\Controllers\CartController@decrease');
$router->post('/deletecart/(\d+)','App\Controllers\CartController@deletecart');
$router->get('/order','App\Controllers\OrderController@order');
$router->get('/myorder','App\Controllers\OrderController@myorder');
$router->post('/PlaceOrder','App\Controllers\OrderController@PlaceOrder');
      //contact
$router->get('/contact', 'App\Controllers\HomeController@showContact');
      //user
$router->get('/login', 'App\Controllers\UserController@showLogin');
$router->post('/login', 'App\Controllers\UserController@Login');
$router->get('/register', 'App\Controllers\UserController@showRegister');
$router->post('/register', 'App\Controllers\UserController@Register');
$router->get('/logout', 'App\Controllers\UserController@logout');
//admin
   //login
$router->get('/admin/login', 'App\Controllers\UserController@showLoginAdmin');
$router->post('/admin/login', 'App\Controllers\UserController@LoginAdmin');
$router->get('/admin/logoutAdmin', 'App\Controllers\UserController@logoutAdmin');
   //category
$router->get('/admin', 'App\Controllers\CategoryController@admin');
$router->get('/admin/categories/add', 'App\Controllers\CategoryController@showAddPage');
$router->post('/admin', 'App\Controllers\CategoryController@create');
$router->get('/admin/categories/edit/(\d+)', 'App\Controllers\CategoryController@showEditPage');
$router->post('/admin/(\d+)', 'App\Controllers\CategoryController@update');
$router->get('/admin/categories/delete/(\d+)', 'App\Controllers\CategoryController@delete');

   //book
$router->get('/admin/books', 'App\Controllers\BookController@index');
$router->get('/admin/books/add', 'App\Controllers\BookController@showAddPage');
$router->post('/admin/books', 'App\Controllers\BookController@create');
$router->get('/admin/books/edit/(\d+)', 'App\Controllers\BookController@showEditPage');
$router->post('/admin/books/(\d+)', 'App\Controllers\BookController@update');
$router->get('/admin/books/delete/(\d+)', 'App\Controllers\BookController@delete');