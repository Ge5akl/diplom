<?php
    //Подключение шапки
    require_once("header.php");
?>
<?php 
    include("dbconnect.php")
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

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Название предмета</th>
      <th>Дата</th>
      <th>Аудитория</th>
      <th>Преподаватель</th>
    </tr>
  </thead>
  <tbody>
<?php
    $result = mysqli_query($mysqli, "SELECT DISTINCT schedule.* FROM `users` INNER JOIN `schedule` ON users.group = schedule.group");
   while ($r1 = mysqli_fetch_assoc($result)) {

    echo "<tr>";
    echo "<td>";
    echo $r1['number_pairs'];
    echo "</td>";
    echo "<td>";
    echo $r1['name_pairs'];
    echo "</td>";
    echo "<td>";
    echo $r1['date'];
    echo "</td>";
    echo "<td>";
    echo $r1['auditore'];
    echo "</td>";
    echo "<td>";
    echo $r1['teacher'];
    echo "</td>";
    echo "</tr>";
   }
?>
 </tbody>
</table>
<?php
include 'footer.php';
?>

<?php
                }
            ?>