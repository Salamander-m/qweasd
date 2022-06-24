<?php
$link = mysqli_connect("localhost:3307", "root", "", "name_surname");
$i = 0;
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно <br>");
    $query = "SELECT `name_job` FROM `jobs`";
    $result = mysqli_query($link, $query);
    while($row = $result->fetch_assoc()){
        $list[$i]['name_job'] = $row['name_job'];
        $i++;
     }
    
    // завершение подключения
    $link->close();
}?>

<fieldset>
    <form method="post" action="add_user.php">
        <label for="first_name">Имя сотрудника:</label><br/>
        <input type="text" name="name" size="30"><br/>
        <label for="last_name">Фамилия сотрудника:</label><br/>
        <input type="text" name="surname" size="30"><br/>
        <label for="first_name">Должность:</label><br/>
        <select name="job" required>
            <?php foreach($list as $item): 
                ?><option><?php echo $item['name_job']?></option>;
            <?php endforeach; ?>
        </select><br/>
        <p></p>
        <input id="submit" type="submit" value="Добавить"><br/>
    </form>
</fieldset>
<p></p>
<form method="post" action="all_users.php">
    <input id="submit" type="submit" value="Вывести всех пользователей"><br/>
</form>
<a href="main.php">Вернуться на главную</a>