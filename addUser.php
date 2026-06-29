<?php
function loginExist($login)
{
    $fileName = "users.txt";

    if(!file_exists($fileName))
        {
            return false;
        }
         $users = file($fileName,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
         foreach($users as $user){
            $parts = explode(":",$user);

            if($parts[0] === $login){
                return true;
            }
         }
         return false;
}

function addUser($user){
    $fileName = "users.txt";
    $line = $user["login"] . ":" . $user["password"] . ":" . $user["email"] .":". $user["age"].":". $user["city"].":". $user["name"]. PHP_EOL;
    file_put_contents($fileName,$line,FILE_APPEND);
}

$message = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $login = $_POST["login"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $city = $_POST["city"];
    $name = $_POST["name"];

    if($login === "" || $password === "" || $email === ""|| $age === "" || $city === "" || $name === ""){
        $message = "Заполните все поля";
    }elseif(loginExist($login))
    {
        $message = "Пользователь с таким логином уже сущ";
    }elseif(loginExist($login)){
        $user =[
            "login" => $login,
            "password" => $password,
            "email" => $email,
            "age" => $age,
            "city" => $city,
            "name" => $name
        ];
        addUser($user);
        $message ="Успешно добав";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление пользовот</title>
</head>
<body>
    <h1>Добавить пользователя</h1>

    <nav>
        <a href="index.php">Главная</a>

        <a href="ShowUser.php">Показать всех </a>
    </nav>

    <hr>

    <?php
if($message !== ""){
    echo "<p>$message</p>";
}

?>

<form action="addUser.php" method="post">
    <p>
        <label>Логин:</label>
        <input type="text" name ="login">
    </p>
     <p>
        <label>Пароль:</label>
        <input type="password" name ="password">
    </p>
     <p>
        <label>город:</label>
        <input type="city" name ="city">
    </p>
     <p>
        <label>майл:</label>
        <input type="email" name ="email">
    </p>
     <p>
        <label>майл:</label>
        <input type="email" name ="email">
    </p>

    <button type="submit">Добавить</button>


</form>
</body>
</html>