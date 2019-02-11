<?php include("server.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-page">
  <div class="form">
  <h1>Login</h1>
    <form action="login.php" method="post">
    <?php include('errors.php'); ?>
      <input type="text" placeholder="username" name="username"/>
      <input type="password" placeholder="password" name="password" />
      <button name="login_user">login</button>  
      <p class="message">Not registered? <a href="registration.php">Create an account</a></p>
    </form>
  </div>
</div>
</body>
</html>

