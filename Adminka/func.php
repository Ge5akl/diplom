<?php
include 'config.php';

$first_name = $_POST['name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Create

if (isset($_POST['submit'])) {
	$password = htmlspecialchars($password, ENT_QUOTES);
	//Шифруем папроль
	$password = md5($password."top_secret"); 
	$sql = ("INSERT INTO `users`(`name`, `last_name`, `email`, `password` ) VALUES(?,?,?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$first_name, $last_name, $email, $password]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
}

// Read

$sql = $pdo->prepare("SELECT * FROM `users`");
$sql->execute();
$result = $sql->fetchAll();

// Update
$edit_name = $_POST['edit_name'];
$edit_last_name = $_POST['edit_last_name'];
$edit_email = $_POST['edit_email'];
$edit_password = $_POST['edit_password'];
$get_id = $_GET['id'];
if (isset($_POST['edit-submit'])) {
	$sqll = "UPDATE users SET name=?, last_name=?, email=?, password=? WHERE id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_name, $edit_last_name, $edit_email, $edit_password , $get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

// DELETE
if (isset($_POST['delete_submit'])) {
	$sql = "DELETE FROM users WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}
