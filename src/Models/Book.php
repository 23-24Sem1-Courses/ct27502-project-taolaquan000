<?php

namespace App\Models;

class Book
{
   public int $id = -1;
   public string $title;
   public string $description;
   public int $price;
   public int $category_id;
   public string $images;

   public function __construct(array $data = [])
   {
      $this->fill($data);
   }

   public static function all(): array
   {
      $books = [];

      $query = PDO()->prepare('select * from books');
      $query->execute();
      while ($row = $query->fetch()) {
         $book = new Book();
         $book->fillFromDb($row);
         $books[] = $book;
      }

      return $books;
   }

   public function save()
   {
      $result = false;

      if ($this->id >= 0) {
         $query = PDO()->prepare('update books set title = :title, author = :author, description = :description, price = :price, category_id = :category_id , image = :image where id = :id');
         $result = $query->execute([
               'id' => $this->id,
               'title' => $this->title,
               'author' => $this->author,
               'description' => $this->description,
               'price' => $this->price,
               'category_id' => $this->category_id,
               'image' => $this->image
         ]);
      } else {
         $query = PDO()->prepare('insert into books (title, author, description, price,category_id, image)
                           values (:title, :author, :description, :price, :category_id, :image)');
         $result = $query->execute([
               'title' => $this->title,
               'author' => $this->author,
               'description' => $this->description,
               'price' => $this->price,
               'category_id' => $this->category_id,
               'image' => $this->image
         ]);
         if ($result) {
               $this->id = PDO()->lastInsertId();
         }
      }

      return $result;
   }

   public function delete()
   {
      $query = PDO()->prepare('delete from books where id = :id');
      return $query->execute(['id' => $this->id]);
   }

   public static function findById(int $id)
   {
      $query = PDO()->prepare('select * from books where id = :id');
      $query->execute(['id' => $id]);
      if ($row = $query->fetch()) {
         $book = new Book();
         $book->fillFromDb($row);
         return $book;
      }
      return null;
   }
   public static function Product_new()
   {
      $books = [];

      $query = PDO()->prepare('select * from books order by id desc limit 0,6');
      $query->execute();
      while ($row = $query->fetch()) {
         $book = new Book();
         $book->fillFromDb($row);
         $books[] = $book;
      }

      return $books;
   }

   public static function Product_like()
   {
      $books = [];

      $query = PDO()->prepare('select * from books where Rand(id) order by id desc limit 0,6');
      $query->execute();
      while ($row = $query->fetch()) {
         $book = new Book();
         $book->fillFromDb($row);
         $books[] = $book;
      }

      return $books;
   }
   public static function user_like($id)
   {
      $books = [];

      $query = PDO()->prepare('select * from books where id != :id  and Rand(id) order by id desc limit 0,5');
      $query->execute(['id' => $id]);
      while ($row = $query->fetch()) {
         $book = new Book();
         $book->fillFromDb($row);
         $books[] = $book;
      }

      return $books;
   }

   public static function similar_product(int $iddm, int $id)
   {
      $books = [];
      $query = PDO()->prepare('select b.id, b.title, b.price, b.image, b.author, b.description, b.category_id from books b join categories c on b.category_id = c.id where b.category_id = :iddm and b.id != :id and Rand(b.id) limit 0,6');
      $query->execute(['iddm' => $iddm,'id' => $id]);
      while ($row = $query->fetch()) {
         $book = new Book();
         $book->fillFromDb($row);
         $books[] = $book;
      }
      return $books;
   }

   public static function Product_manga()
   {
      $books = [];

      $query = PDO()->prepare('select b.id, b.title, b.price, b.image, b.author, b.description, b.category_id from books b join categories c on b.category_id = c.id where b.category_id = 3 and Rand(b.id) limit 0,8');
      $query->execute();
      while ($row = $query->fetch()) {
         $book = new Book();
         $book->fillFromDb($row);
         $books[] = $book;
      }

      return $books;
   }
   protected function fillFromDb(array $row)
   {
      $this->id = $row['id'];
      $this->title = $row['title'];
      $this->author = $row['author'];
      $this->description = $row['description'];
      $this->price = $row['price'];
      $this->category_id = $row['category_id'];
      $this->image = $row['image'];
      return $this;
   }

   public function fill(array $data)
   {
      $this->title = $data['title'] ?? '';
      $this->author = $data['author'] ?? '';
      $this->description = $data['description'] ?? '';
      $this->price = $data['price'] ?? 0;
      $this->category_id = $data['category_id'] ?? 1;
      $this->image = $data['image'] ?? '';
      return $this;
   }
}