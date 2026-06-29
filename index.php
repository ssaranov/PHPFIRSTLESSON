<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Глав стр</title>
</head>
<body>
<link rel="stylesheet" href="style.css">
<h1>Регистарция пользователей</h1>  
<nav>
    <a href="addUser.php">Добавить</a>

    <a href="ShowUser.php">Показать</a>
</nav>  

<?php
    $fileName = "users.txt";
    $userscount = 0;

    if(file_exists($fileName))
        {
            $users = file($fileName,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $usercount = count($users);
        }

        echo "<p>Колличество пользователей: $userscount</p>"
?>
</body>
</html>`