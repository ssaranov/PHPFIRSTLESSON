<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список пользователей</title>
</head>
<body>
     <h1>пользователи</h1>

    <nav>
        <a href="index.php">Главная</a>

        <a href="addUser.php">Показать всех </a>
    </nav>

    <hr>


    <?php
        $filename="users.txt";

        if(!file_exists($filename)){
            echo "<p> Файл юзерс не найден</p>";
        }else{
            $users = file($filename,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if(count($users) === 0){
                echo "<p> пока нету польз</p>";
            }else{
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Логин</th>";
                echo "<th>пароль </th>";
                echo "<th>мейл</th>";
                echo "<th>возраст</th>";
                echo "<th>город</th>";
                echo "<th>имя</th>";

                echo "/<tr>";
                foreach($users as $user){
                    $parts = explode(":",$user);


                    echo "<tr>";
                    echo "<td>$parts[0]</td>";
                    echo "<td>$parts[1]</td>";
                    echo "<td>$parts[2]</td>";
                    echo "<td>$parts[3]</td>";
                    echo "<td>$parts[4]</td>";
                    echo "<td>$parts[5]</td>";
                    echo "</tr>";
                }

                echo "</table>";
            }
        }
    ?>
</body>
</html>