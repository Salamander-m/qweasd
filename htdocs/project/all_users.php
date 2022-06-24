<?php
include('jobs.php');
$link = mysqli_connect("localhost:3307", "root", "", "name_surname");
$list = array();
$i = 0;
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    $query = "SELECT `number`,`name`,`surname`,`job`,`salary`,`date_of_employment` FROM `workers` INNER JOIN `jobs` ON job = name_job;";
    $result = mysqli_query($link, $query);
    while($row = $result->fetch_assoc()){
        $list[$i]['number'] = $row['number'];
        $list[$i]['name'] = $row['name'];
        $list[$i]['surname'] = $row['surname'];
        $list[$i]['job'] = $row['job'];
        $list[$i]['salary'] = $row['salary'];
        $list[$i]['date_of_employment'] = $row['date_of_employment'];
        $i++;
     }
    // завершение подключения
    $link->close();   
}
?>
<h3 align="center">Таблица сотрудников</h3>
<table align="center" rules="all" border="2" bordercolor="black" cellpadding="7" width="100%">
<th align="center">ID</th>
<th align="center">Имя</th>
<th align="center">Фамилия</th>
<th align="center">Должность</th>
<th align="center">Оклад</th>
<th align="center">Дата устройства</th>
<?php foreach($list as $item): ?>
<tr> 
<td align="center"> <?php echo $item['number'];?></td>
<td align="center"> <?php echo $item['name'];?></td>
<td align="center"> <?php echo $item['surname'];?></td>
<td align="center"> <?php echo $item['job'];?></td>
<td align="center"> <?php echo $item['salary'];?></td>
<td align="center"> <?php echo $item['date_of_employment'];?></td>
</tr>
<?php endforeach; ?>
</table>
<a href="main.php">Вернуться на главную</a>