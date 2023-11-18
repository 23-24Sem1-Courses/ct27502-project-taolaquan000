<?php 

namespace App\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItems;
class OrderController {
   public function order()
   {
      if(isset($_SESSION['username'])){
         render_view('order',['pay' => 'Thanh toán']);
      } else {
         $_SESSION['order_error']= 'Bạn cần đăng nhập để thực hiện chức năng này';
         redirect('/');
      }
   }
   public function PlaceOrder()
   {  
      if(isset($_SESSION['username'])){
         if(isset($_SESSION['cart'])){
         $iduser=$_SESSION['username']['id'];
         $user = new User();
         $order = new Order();
         $order_item = new OrderItems();
         if($user->fill($_POST)->update($iduser)){
            $total_price=total_price();
            $created_at=date('Y-m-d H:i:s');
            $idorder=$order->insertOrder($iduser,$total_price,$created_at);
            foreach ($_SESSION['cart'] as $cart) {
               $order_item->insertOrderItems($idorder,$cart['id'],$cart['quantity'],$cart['price']);
            }
            unset($_SESSION['cart']);
            $_SESSION['order_success']="Đặt hàng thành công";
         }
      }}
   redirect('/');
   }
   public function myorder(){
      $iduser=$_SESSION['username']['id'];
      $order = new Order();
      $myorder= $order->allMyOrder($iduser);
      render_view('myorder',['myorder' => $myorder]);
      }
}
