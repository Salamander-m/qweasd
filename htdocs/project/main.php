<head>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
  <title>Вход</title>
</head>
<?php
$link = mysqli_connect("localhost:3307", "root", "", "login_n_passwd");
if ($link == false){
  print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
  echo <<<HTML
  <fieldset>
  <p>Введите ваши данные</p>
  <form method="post" action="">
  Логин:<br>
  <input  type="text" name="login_input" size="30"><br/>
  Пароль:<br>
  <input  type="password" name="passwd_input" size="30"><br/>
  <p></p>
  <input  type="submit" name="sub" value="Войти"><br/>
  </form>
  </fieldset>
  <fieldset>
  </html>
  HTML;
  if($_COOKIE['id'] != ''){
    $login = $_COOKIE['id'];
    $passwd = $_COOKIE['passwd'];
  }
  if(isset($_POST['sub']))
  {
    setcookie("id",$_POST['login_input']);
    echo($_COOKIE['id']);
    $login = $_POST['login_input'];
    $passwd = $_POST['passwd_input'];
    header('Location:http://localhost/project/main.php');
  }
  $query = "SELECT `ID`, `login`, `password` FROM `accounts` WHERE `login`='$login' and `password`='$passwd'";
  $result = mysqli_query($link, $query);
  
  while($row = $result->fetch_assoc()){
    echo "<h3 align='center'>Добро пожаловать, ".$row['login'];
    echo "!</h3><br></<fieldset>";
    if ($_COOKIE['id']=='admin' | ($login==$row['login'] & $passwd==$row['password'] & $login == 'admin')){ 
      setcookie("id",$login);
      setcookie("passwd",$passwd);?>
      <fieldset>
          <p>
          <a href="add_login.php">Добавить пользователя</a>
          <br>
          <a href="add_worker.php">Добавить сотрудника</a>
          <br>
          <a href="all_logins.php">Просмотр всех пользователей</a>
          </p>
      </fieldset>    
    <?php 
  }
    if($_COOKIE['id']==$login | $login==$row['login'] & $passwd==$row['password']): 
      setcookie("id",$login);
      setcookie("passwd",$passwd);?> 
      <fieldset>
          <form method="post" action="del_worker.php">
          Удалить работника по номеру в списке
          <label for="number_change"><br>Номер работника:</label><br/>
          <input type="text" name="number_del" size="30"><br/>
          <input id="submit" type="submit" value="Удалить запись по номеру"><br/>
          </form>
      </fieldset>        
      <?php 
      endif;
      
    }
}

?>
<body>
<fieldset>
    <form method="post" action="search_user.php">
    <label for="name_search">Имя для поиска:</label><br/>
    <input type="text" name="name_search" size="30"><br/>
    <label for="surname_search">Фамилия для поиска:</label><br/>
    <input type="text" name="surname_search" size="30"><br/>
    <p></p>
    <input id="submit" type="submit" value="Найти и вывести"><br/>
    </form>
</fieldset>

<!DOCTYPE HTML>
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
        <title>Главная</title>
    </head>

    <body>
        <fieldset>
        <form method="post" action="number_search.php">
        Поиск работника по номеру в списке
        <label for="number_serach"><br>Номер работника:</label><br/>
        <input type="text" name="number_search" size="30"><br/><br>
        <input id="submit" type="submit" value="Найти запись по номеру"><br/>
        </form>
        </fieldset>
        <fieldset>
        <form  method="post" action="all_users.php">
            <button>Просмотр всех сотрудников</button>
        </form>
        </fieldset>
        
    </body>
</html>