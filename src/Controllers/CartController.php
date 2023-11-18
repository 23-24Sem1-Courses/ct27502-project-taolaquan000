<?php

namespace App\Controllers;

use App\Models\Book;

class CartController
{
	public function AddCart($id)
	{
      if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quantity']++;
      } else {
         $cartdb=Book::findById($id);
         if($cartdb) {
            $_SESSION['cart'][$id]=array(
            'id' => $cartdb->id,
            'quantity' => 1,
            'title' => $cartdb->title, 
            'author' => $cartdb->author,
            'price' => $cartdb->price, 
            'category_id' => $cartdb->category_id,
            'image' => $cartdb->image
            );
         } else {
            $message='Sản phẩm không tồn tại';
         }
      }
      redirect('/');
	}
   public function increase($id){
      $_SESSION['cart'][$id]['quantity'] += 1;
      redirect('/cart');
   }
   public function decrease($id){
      if($_SESSION['cart'][$id]['quantity']>1){
      $_SESSION['cart'][$id]['quantity'] -= 1;
      } else {
         unset($_SESSION['cart'][$id]);
      }
      redirect('/cart');
   }
   public function deletecart($id){
      if(isset($_SESSION['cart'][$id]))
         unset($_SESSION['cart'][$id]);
      redirect('/cart');
   }
}
