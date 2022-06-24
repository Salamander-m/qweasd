<?php
$link = mysqli_connect("localhost:3307", "root", "", "name_surname");
$list = array();
$i = 0;
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    $query = "SELECT * FROM `jobs`";
    $result = mysqli_query($link, $query);
    while($row = $result->fetch_assoc()){
        $list[$i]['ID'] = $row['ID'];
        $list[$i]['name_job'] = $row['name_job'];
        $list[$i]['salary'] = $row['salary'];
        $i++;
     }
    // завершение подключения
    $link->close();   
}?>
<table align="center" rules="all" border="2" bordercolor="black" cellpadding="7" width="100%">
<caption><h3>Таблица должностей</h3></caption>
<th align="center">ID</th>
<th align="center">Название</th>
<th align="center">Оклад</th>
<?php foreach($list as $item): ?>
<tr> 
<td align="center"> <?php echo $item['ID'];?></td>
<td align="center"> <?php echo $item['name_job'];?></td>
<td align="center"> <?php echo $item['salary'];?></td>
</tr>
<?php endforeach; ?>
</table>