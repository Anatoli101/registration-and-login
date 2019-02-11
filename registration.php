<?php  include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-page">
  <div class="form">
  <h1>Registration</h1>
    <form class="register-form" method="post" action="registration.php">
    <?php include("errors.php");?> 
    <input type="text" class="place-name" placeholder="Username" name="username" value="<?php echo $username ?>" />
      <input type="email" placeholder="Mail" name="email" value="<?php echo $email ?>" />
      <input type="password" class="password" placeholder="Password" name="password_1"/>
    <div class="pas-con" style="display:none">
        Password may contain letter and numbers <br>
Must contain at least 1 number and 1 letter <br>
May contain any of these characters: !@#$% <br>
Must be 8-12 characters <br>
    </div>
      <input type="password" placeholder="Confrim Password" name="password_2"/>

      <button type="submit" name="register" class="btn">create</button>

      <p class="message">Already registered? <a href="login.php">Sign In</a></p>
    </form>

  </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(".password").click(function(){
        $(".pas-con").fadeIn("200");
    });
</script>
</html>