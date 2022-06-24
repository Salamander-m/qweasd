<?php
$link = mysqli_connect("localhost:3307", "root", "", "login_n_passwd");

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно <br>");
    print("СПИСОК ВСЕХ ПОЛЬЗОВАТЕЛЕЙ <br>");
    $query = "SELECT * FROM `accounts`";
    $result = mysqli_query($link, $query);
    while($row = $result->fetch_assoc()){
        echo $row['ID'];
        echo ' - ';
        echo  $row['login'];
        echo  ' - ';
        echo  $row['password'];
        echo  '<br>';
     }
    // завершение подключения
    $link->close();
}
?>
<a href="main.php">Вернуться к главной </a>