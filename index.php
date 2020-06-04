<?php
    //Подключение шапки
    require_once("header.php");
?>

<?php
                //Проверяем авторизован ли пользователь
                if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
                    // если нет, то выводим блок с ссылками на страницу регистрации и авторизации
            ?>
            <?php  echo $_SESSION['email']?>
<h1>Не авторизоованы!!!</h1>

<?php
                    }else{
                        //Если пользователь авто    ризован, то выводим ссылку Выход
                ?> 
<div class="jumbotron">
    <div class="container">
        <h1>Расписание</h1>
        <p>Здесь вы можете ознакомиться с актуальным расписанием</p>
        <p><a class="btn btn-primary btn-lg" href="Schedule.php" role="button">Просмотреть расписание</a></p>
    </div>
</div>
<div class="jumbotron">
    <div class="container">
        <h1>Зачетка</h1>
        <p>Здесь вы можете просмотреть все свои оценки за весь период обучнеия</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Ознакомиться с оценками</a></p>
    </div>
</div>
<div class="jumbotron">
    <div class="container">
        <h1>Курсы</h1>
        <p>В разработке</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Разработка</a></p>


    <form method="POST">
    <input style="display: inline;" type='text' name='pole2' size='2'>
    <p><input style="cursor:pointer;display: inline;" type="submit" name="button_id" value="OK" /></p>
</form>

<?php
//echo $_SESSION['email'].', добро пожаловать в Личный Кабинет';
if(isset( $_POST['button_id']))
{
    $a = $_SESSION['email'];
    $b = $_POST['pole2'];

$str= mysqli_connect('localhost', 'root', '', 'diplom');
$select= mysqli_query($str, "SELECT first_name, id, email FROM users WHERE email = '".$a."'");
while ($r= mysqli_fetch_array($select)) {
        echo $r['first_name'] . " ";
        echo $r['email'] . " ";
        echo $r['id']. "<br />";
        echo $r[$val] . " ";
}
mysqli_close($str);

$str= mysqli_connect('localhost', 'root', '', 'diplom');
$select= mysqli_query($str, "UPDATE users  SET email='".$b."' WHERE email = '".$a."'");

mysqli_close($str);

$str= mysqli_connect('localhost', 'root', '', 'diplom');
$select= mysqli_query($str, "SELECT first_name, id, email FROM users WHERE email = '".$a."'");
while ($r= mysqli_fetch_array($select)) {
        echo $r['first_name'] . " ";
        echo $r['email'] . " ";
        echo $r['id']. "<br />";
        echo $r[$val] . " ";
}
mysqli_close($str);
}
?>
    </div>
</div>

<?php
                }
            ?>

