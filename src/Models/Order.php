<?php

namespace App\Models;

class Order
{
   public int $id = -1;
   public int $user_id;
   public int $total_price;

   public function __construct(array $data = [])
   {
      $this->fill($data);
   }
   public function insertOrder($user_id,$total_price,$created_at)
   {
      $result = false;
         $query = PDO()->prepare('insert into orders (user_id, total_price, created_at)
                           values (:user_id, :total_price, :created_at)');
         $result = $query->execute([
               'user_id' => $user_id,
               'total_price' => $total_price,
               'created_at' => $created_at
         ]);
      $order_id = PDO()->lastInsertId();

      return $order_id;
   }
   public function allMyOrder($user_id)
   {
      $query = PDO()->prepare('SELECT * FROM orders JOIN order_items ON orders.id = order_items.order_id JOIN books ON order_items.book_id = books.id WHERE orders.user_id = :user_id ORDER BY orders.created_at DESC');
      $query->execute(['user_id' => $user_id]);
      $result = $query->fetchAll();
      return $result;
   }
   protected function fillFromDb(array $row)
   {
      $this->id = $row['id'];
      $this->user_id = $row['user_id'];
      $this->total_price = $row['total_price'];
      $this->created_at = $row['created_at'];
      return $this;
   }

   public function fill(array $data)
   {
      $this->user_id = $data['user_id'] ?? 1;
      $this->total_price = $data['total_price'] ?? 0;
      $this->created_at = $data['created_at'] ?? '';
      return $this;
   }
}