<?php
$link = mysqli_connect("localhost:3307", "root", "", "name_surname");

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно <br>");
    $query = "SELECT * FROM `workers`";
    $result = mysqli_query($link, $query);
    while($row = $result->fetch_assoc()){
        echo  $row['name'];
        echo  ' - ';
        echo  $row['surname'];
        echo  '<br>';
     }
    // завершение подключения
    $link->close();
}