<?php

try {
	$pdo = new PDO('mysql:dbname=test2; host=localhost', 'root', '');
} catch (PDOException $e) {
	die($e->getMessage());
}