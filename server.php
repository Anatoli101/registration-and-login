<?php 
    session_start();

    $username = "";
    $email = "";
    $errors = array();

    //Connect to database
    $db = mysqli_connect("localhost","root", "root", "registration");

    
    //when button was clicked
    if (isset($_POST["register"])){

        $username =   $_POST['username'];
        $email =      $_POST['email'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        //check the fills
        if(empty($username)){
            array_push($errors, "Username required");
        }

        if(empty($email)){
            array_push($errors, "Email required");
        }
        if(empty($password_1)){
            array_push($errors, "Password required");
        }
        if($password_1 != $password_2){
            array_push($errors, "Passwords don't match");
        }

        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $password_1)) {
            array_push($errors,  'the password does not meet the requirements!');
        }

        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['username'] === $username) {
              array_push($errors, "Username already exists");
            }
        
            if ($user['email'] === $email) {
              array_push($errors, "email already exists");
            }
          }

        if(count($errors) == 0){
            $password = md5($password_1);//enscrypting
             //land the information to the database
            $query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";

            mysqli_query($db, $query);// this function execute the calling to database

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are logged in";
            header("location: index.php");
        }
    }

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        var_dump("cccc");
        //check the fills
        if (empty($username)) {
            array_push($errors, "Username required");
        }

        if (empty($password)){
            array_push($errors, "Password required");
        }
        
        if (count($errors) == 0){
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $results = mysqli_query($db, $query);
            
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are logged in";
                header('location: index.php');
            } else {
                array_push($errors, "WRONG DATA");
                echo 'bad';
            }
        }
    }

    // if (isset($_POST['login_user'])) {
    //     $username = mysqli_real_escape_string($db, $_POST['username']);
    //     $password = mysqli_real_escape_string($db, $_POST['password']);
      
    //     if (empty($username)) {
    //         array_push($errors, "Username is required");
    //     }
    //     if (empty($password)) {
    //         array_push($errors, "Password is required");
    //     }
      
    //     if (count($errors) == 0) {
    //         $password = md5($password);
    //         $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    //         $results = mysqli_query($db, $query);
    //         if (mysqli_num_rows($results) == 1) {
    //           $_SESSION['username'] = $username;
    //           $_SESSION['success'] = "You are now logged in";
    //           header('location: index.php');
    //         }else {
    //             array_push($errors, "Wrong username/password combination");
    //         }
    //     }
    //   }

?>