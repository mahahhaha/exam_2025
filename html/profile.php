<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labarov Maksim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar-dark bg-dark p-3">
        <div class="container-fluid">
            <a href="#" class="navbar-brand d-flex align-items-center">
            </a>
                <form action="/logout.php" method="post" class="d-flex"><button class="btn btn-outline-danger" type="submit">Logout</button></form>
            
        </div>
    </nav>
    <div class="container mt-5">
        <div class="story-container">
            <div class="story-text">
            <?php
                if(isset($_COOKIE['User'])):
                    $username = htmlspecialchars($_COOKIE['User']);
            ?>
            <div class="d-flex align-items-center">
            <span class="text-light me-3">Привет, <?= $username ?>!</span>
            <?php
               endif; 
            ?>
            </div>
        </div>
        <div class="mt-3 text-center" id="extraImage" style="display: none;"></div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>

<?php
    if(!isset($_COOKIE['User'])){
        header('Location: /login.php');
        exit();
    }
