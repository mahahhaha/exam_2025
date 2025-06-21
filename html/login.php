<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labarov Maksim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-4">Login</h1>
                <form action="/login.php" method="POST" class="d-flex flex-column gap-3">
                    <input type="text" name="login" class="form-control-hacker-input" placeholder="login">
                    <input type="password" name="password" class="form-control-hacker-input" placeholder="password">
                    <button class="btn btn-primary" type="submit" name='submit'>Login</button>
                    <p class="mt-3">Don't have an account?<a href="/registration.php">Registration</a></p>
                </form>

            </div>
        </div>
    </div>
        
</body>
</html>

<?php

    require_once('db.php');
    

    if (isset($_COOKIE['User'])) {
        header("Location: /profile.php");
        exit;
    }
    $link = mysqli_connect('db', 'root', 'kali', 'first');

    if (isset($_POST['submit'])) {
        $login = $_POST['login'];
        $pass = $_POST['password'];

        if (!$login || !$pass){
            die ('Input all parameters');
        }

        $sql = "SELECT * FROM users WHERE username='$login' AND password='$pass'";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) == 1) {
            setcookie("User", $login, time()+7200);
            header('Location: /profile.php');
          } else {
            echo "Incorrect username or password";
          }
    }
?> 
