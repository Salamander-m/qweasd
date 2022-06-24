<fieldset>
<?php
$link = mysqli_connect("localhost:3307", "root", "", "name_surname");
$name = $_POST['name_search'];
$surname = $_POST['surname_search'];
$result = ' ';
$array=('');
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    $query = "SELECT `number`,`name`, `surname`,`job`,`date_of_employment` FROM `workers` WHERE `name`='$name' OR `surname`='$surname'";
    $result = mysqli_query($link, $query);

    while($row = $result->fetch_assoc()){
        echo $row['number'];
        echo ' - ';
        echo  $row['name'];
        echo ' - ';
        echo  $row['surname'];
        echo '<br>';
        echo 'Должность - '.$row['job'];
        echo '<br>';
        echo 'Работает с '.$row['date_of_employment'];
        echo  '<br>';
    }
    // завершение подключения
    $link->close();
}?>
</fieldset>
<a href="main.php">Вернуться на главную</a>