<?php
namespace App\Models;
class User{
      public int $id = -1;
      public string $username;
      public string $password;
      public string $email;
      public string $fullname;
      public string $address;
      public string $phone;

      public function __construct(array $data = [])
      {
         $this->fill($data);
      }
   
      public static function all(): array
      {
         $users = [];
   
         $query = PDO()->prepare('select * from users');
         $query->execute();
         while ($row = $query->fetch()) {
            $user = new User();
            $user->fillFromDb($row);
            $users[] = $user;
         }
   
         return $users;
      }
      public function create(){
         $result = false;
         $query = PDO()->prepare('insert into users (username, password, email)
         values (:username, :password, :email)');
         $result = $query->execute([
            'username' => $this->username,
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
            'email' => $this->email
         ]);
         return $result;
      }
      public function update($id)
      {
         $result = false;
         $query = PDO()->prepare('update users set fullname = :fullname, address = :address, phone = :phone  where id = :id');
         $result = $query->execute([
               'id' => $id,
               'fullname' => $this->fullname,
               'address' => $this->address,
               'phone' => $this->phone
         ]);
         return $result;
      }

      public function login(String $username, String $password){
         $query = PDO()->prepare('select * from users where username = :username');
         $query->execute([
            'username' => $username,
         ]);
         $user = $query -> fetch(); 
         if ($user && password_verify($password, $user['password'])) {
            // Nếu tên đăng nhập và mật khẩu hợp lệ, trả về true
            return $user;
         } 
      }
      public function save()
      {
         $result = false;
         $query = PDO()->prepare('insert into users (username, password, email)
                           values (:username, :password, :email)');
         $result = $query->execute([
               'username' => $this->username,
               'password' => password_hash($this->password, PASSWORD_DEFAULT),
               'email' => $this->email
         ]);
         if ($result) {
               $this->id = PDO()->lastInsertId();
         }
   
         return $result;
      }
   
      public function delete()
      {
         $query = PDO()->prepare('delete from users where id = :id');
         return $query->execute(['id' => $this->id]);
      }
      

      public static function findById(int $id)
      {
         $query = PDO()->prepare('select * from users where id = :id');
         $query->execute(['id' => $id]);
         if ($row = $query->fetch()) {
            $user = new User();
            $user->fillFromDb($row);
            return $user;
         }
         return null;
      }

      protected function fillFromDb(array $row)
      {
         $this->id = $row['id'];
         $this->username = $row['username'];
         $this->password = $row['password'];
         $this->email = $row['email'];
         $this->fullname = $row['fullname'];
         $this->address = $row['address'];
         $this->phone = $row['phone'];
         return $this;
      }
   
      public function fill(array $data)
      {
         $this->username = $data['username'] ?? '';
         $this->password = $data['password'] ?? '';
         $this->email = $data['email'] ?? '';
         $this->fullname = $data['fullname'] ?? '';
         $this->address = $data['address'] ?? '';
         $this->phone = $data['phone'] ?? '';
         return $this;
      }
      public function fill_login(array $data)
      {
         $this->username = $data['username'] ?? '';
         $this->password = $data['password'] ?? '';
         return $this;
      }
}
?>