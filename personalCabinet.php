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
                        //Если пользователь авторизован, то выводим ссылку Выход
                ?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        <h1>Личный кабиент</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <ul>
                <li> Имя: 
                <?php
                    $a = $_SESSION['email'];
                    $str= mysqli_connect('localhost', 'root', '', 'diplom');
                    $select= mysqli_query($str, "SELECT first_name, last_name FROM users WHERE email = '".$a."'");
                    while ($r= mysqli_fetch_array($select)) {
                            echo $r['first_name'] . " ";
                    mysqli_close($str);
                    } ?>
                </li>
                <li> Фамилия:
                <?php
                    $a = $_SESSION['email'];
                    $str= mysqli_connect('localhost', 'root', '', 'diplom');
                    $select= mysqli_query($str, "SELECT first_name, last_name FROM users WHERE email = '".$a."'");
                    while ($r= mysqli_fetch_array($select)) {
                            echo $r['last_name'] . " ";
                    mysqli_close($str);
                    } ?>
                </li>
                <li> Почта:
                <?php
                    $a = $_SESSION['email'];
                    $str= mysqli_connect('localhost', 'root', '', 'diplom');
                    $select= mysqli_query($str, "SELECT email FROM users WHERE email = '".$a."'");
                    while ($r= mysqli_fetch_array($select)) {
                            echo $r['email'] . " ";
                    mysqli_close($str);
                    } ?>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php
                }
            ?>
