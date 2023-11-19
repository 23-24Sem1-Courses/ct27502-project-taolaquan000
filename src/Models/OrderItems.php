<?php

namespace App\Models;

class OrderItems
{
   public int $id = -1;
   public int $order_id;
   public int $book_id;
   public int $quantity;
   public int $price;

   public function __construct(array $data = [])
   {
      $this->fill($data);
   }
   public function insertOrderItems($order_id,$book_id,$quantity,$price)
   {
      $result = false;
         $query = PDO()->prepare('insert into order_items (order_id, book_id, quantity,price )
                           values (:order_id, :book_id, :quantity, :price)');
         $result = $query->execute([
               'order_id' => $order_id,
               'book_id' => $book_id,
               'quantity' => $quantity,
               'price' => $price
         ]);

      return $result;
   }

   protected function fillFromDb(array $row)
   {
      $this->id = $row['id'];
      $this->order_id = $row['order_id'];
      $this->book_id = $row['book_id'];
      $this->quantity = $row['quantity'];
      $this->price = $row['price'];
      return $this;
   }

   public function fill(array $data)
   {
      $this->order_id = $data['order_id'] ?? 1;
      $this->book_id = $data['book_id'] ?? 1;
      $this->quantity = $data['quantity'] ?? 0;
      $this->price = $data['price'] ?? 0;
      return $this;
   }
}