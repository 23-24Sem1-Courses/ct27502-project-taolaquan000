<?php

namespace App\Models;

class Category
{
   public int $id = -1;
   public string $name;

   public function __construct(array $data = [])
   {
      $this->fill($data);
   }

   public static function all(): array
   {
      $categories = [];

      $query = PDO()->prepare('select * from categories');
      $query->execute();
      while ($row = $query->fetch()) {
         $category = new Category();
         $category->fillFromDb($row);
         $categories[] = $category;
      }

      return $categories;
   }

   public function save()
   {
      $result = false;

      if ($this->id >= 0) {
         $query = PDO()->prepare('update categories set name = :name where id = :id');
         $result = $query->execute([
               'id' => $this->id,
               'name' => $this->name
         ]);
      } else {
         $query = PDO()->prepare('insert into categories (name)
                           values (:name)');
         $result = $query->execute([
               'name' => $this->name
         ]);
         if ($result) {
               $this->id = PDO()->lastInsertId();
         }
      }

      return $result;
   }

   public function delete()
   {
      $query = PDO()->prepare('delete from categories where id = :id');
      return $query->execute(['id' => $this->id]);
   }

   public static function findById(int $id)
   {
      $query = PDO()->prepare('select * from categories where id = :id');
      $query->execute(['id' => $id]);
      if ($row = $query->fetch()) {
         $category = new Category();
         $category->fillFromDb($row);
         return $category;
      }
      return null;
   }

   protected function fillFromDb(array $row)
   {
      $this->id = $row['id'];
      $this->name = $row['name'];
      return $this;
   }

   public function fill(array $data)
   {
      $this->name = $data['name'] ?? '';
      return $this;
   }
}