<?php
$link = mysqli_connect("localhost:3307", "root", "", "login_n_passwd");

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}?>
<form action="" method="post">
Введите данные нового пользователя <br>
Логин:
<input type="text" name="login" size="30"><br>
Пароль:
<input type="password" name="passwd" size "30"><br>
<input type="submit" name="sub" value="Создать"/>
</form>
<?php
if(isset($_POST['sub'])){
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];
    if($login=='admin'){
        echo('Вы не можете создать такого пользователя');
    }
    else{
        print("Соединение установлено успешно <br>");
        $query = "INSERT INTO `accounts`(`login`, `password`) VALUES ('$login','$passwd')";
        $result = mysqli_query($link, $query);
        echo('Успех!'); ?>
        <a href='main.php'>Главная</a>
        <?php
        $link->close();
    }
}
?>