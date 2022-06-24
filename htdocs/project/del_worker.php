<?php
$link = mysqli_connect("localhost:3307", "root", "", "name_surname");
$number = $_POST['number_del'];
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно <br>");
    $query = "DELETE FROM `workers` WHERE `number`='$number'";
    $result = mysqli_query($link, $query);
    print("Успех!<br>");
    // завершение подключения
    $link->close();
}
?>
<a href="add_worker.php">Добавить пользователя <br></a>
<a href="main.php">Вернуться к поиску</a>