<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/css/site/bootstrap.min.css">
   <title>Đăng nhập</title>
</head>
<body class="bg-light">
      <?php 
            if(isset($error))
            echo '<script>alert("'.$error.'")</script>';
            if(isset($success))
            echo '<script>alert("'.$success.'")</script>';
      ?>
      <div class="w-25 m-auto">
         <form id="signinForm" action="/admin/login" method="post">
            <h2 class="mt-5 text-center">Đăng nhập Admin</h2>
            <!-- Email input -->
            <div class="form-outline mb-4">
               <label class="form-label" for="form2Example1">Tên tài khoản</label>
               <input type="text" id="form2Example1" class="form-control" name="username">
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
               <label class="form-label" for="form2Example2">Mật khẩu</label>
               <input type="password" id="form2Example2" class="form-control" name="password">
            </div>
            <!-- 2 column grid layout for inline styling -->
            <!-- Submit button -->
            <input type="submit" class="btn btn-primary btn-block mb-4" value="Login" name="submit">
      </form>
   </div>
   <script src="/js/site/jquery-3.6.3.min.js"></script>
   <script src="/js/site/jquery.validate.js"></script>
   <script src="/js/site/login.js"></script>
</body>
</html>
