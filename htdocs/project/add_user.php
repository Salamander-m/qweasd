<?php
function check_for_number($str) {
    $i = strlen($str); 
    while ($i--) {
      if (is_numeric($str[$i])) return 1;
    }
    return 0;
}
$name = $_POST['name'];
$surname = $_POST['surname'];
$job = $_POST['job'];
$link = mysqli_connect("localhost:3307", "root", "", "name_surname");

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно <br>");
    if ($job == '' || $name == '' || $surname == '' || check_for_number($name) == 1 || check_for_number($surname) == 1 || check_for_number($job) == 1 ){
        print("<p>Введены неправильные данные. Попробуйте снова</p><br>");
    }
    else
    {
        $query = "INSERT INTO `workers`(`name`,`surname`,`job`) VALUES ('$name','$surname','$job')";
        $result = mysqli_query($link, $query);
        print('<br><p>Успешно добавлено</p>');
        // завершение подключения
        $link->close();
    }
    
}
?>
<fieldset>
<form method="post" action="all_users.php">
<input id="submit" type="submit" value="Вывести всех пользователей"><br/>
</form>
</fieldset>