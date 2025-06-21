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
                <h1 class="mb-4">Registration</h1>
                <form action="/registration.php" method="POST" class="d-flex flex-column gap-3">
                    <input type="text" name="login" class="form-control-hacker-input" placeholder="login">
                    <input type="email" name="email" class="form-control-hacker-input" placeholder="email">
                    <input type="password" name="password" class="form-control-hacker-input" placeholder="password">
                    <button class="btn btn-primary" type="submit" name='submit'>Register</button>
                    <p class="mt-3">Already have an account?<a href="/login.php">Login</a></p>
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
    $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $login = $_POST['login'];
        $pass = $_POST['password'];

        if (!$email || !$login || !$pass){
            die ('Input all parameters');
        }

        $sql = "INSERT INTO users(username, email, password) VALUES ('$login', '$email', '$pass')";

        if(!mysqli_query($link, $sql)) {
            echo "Error insert users";
        }else {
            header("Location: /login.php");
            exit;
        }
    }
?> 
