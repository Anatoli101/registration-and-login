<?php include('server.php');
if (empty($_SESSION["username"])){
    header('location: login.php');
}
?>

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
  <h1>WELCOME<?php $_SESSION["username"] ?></h1>
    <div class="content">
        <?php if(isset($_SESSION["success"])):?>
            <p>
            <?php   echo $_SESSION["success"];
                    unset ($_SESSION["success"]); ?>
           </p>
           <a href="login.php">LOGOUT</a>
        <?php endif?>
    </div>
  </div>
</div>
</body>
</html>