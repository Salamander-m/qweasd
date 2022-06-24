<?php
$link = mysqli_connect("localhost:3307", "root", "", "name_surname");
$number = $_POST['number_search'];
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    
    print("Соединение установлено успешно <br>");
    $query = "SELECT * FROM `workers` WHERE `number`=$number";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()){
            echo  $row['name'];
            echo  ' - ';
            echo  $row['surname'];
            echo  '<br>';
        }
    }
    else{
        echo('Нет сотрудника с таким номером <br>');
    }
    // завершение подключения
    $link->close();
}
?>
<a href="add_worker.php">Добавить пользователя <br></a>
<a href="main.php">Вернуться к главной</a>