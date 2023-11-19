
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/site/login.css">
   <link rel="stylesheet" href="css/site/bootstrap.min.css">
   <title>Đăng ký</title>
</head>
<body class="bg-light">
<div class="back-home"><a href="/">Trở về</a></div>
   <?php if(isset($error))
      echo '<script>alert("Tên đăng nhập hoặc mật khẩu không chính xác !")</script>';

   ?>
   <div class="w-25 m-auto">
      <form id="signupForm" action="/register" method="post">
            <h2 class="mt-5 text-center">Đăng ký</h2>
            <!-- Email input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="username">Tên tài khoản</label>
            <input type="text" id="username" class="form-control" name="username">
            </div>
            <div class="form-outline mb-4">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" class="form-control" name="email">
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="password">Mật khẩu</label>
            <input type="password" id="password" class="form-control" name="password">
            </div>
            <div class="form-outline mb-4">
            <label class="form-label" for="confirm_password">Nhập lại mật khẩu</label>
            <input type="password" id="confirm_password" class="form-control" name="confirm_password">
            </div>
            <!-- 2 column grid layout for inline styling -->
            <!-- Submit button -->
            <input type="submit" class="btn btn-primary btn-block mb-4" value="Đăng ký" name="submit">
      </form>
      </div>
<script src="/js/site/jquery-3.6.3.min.js"></script>
<script src="/js/site/jquery.validate.js"></script>
<script src="/js/site/login.js"></script>
</body>
</html>