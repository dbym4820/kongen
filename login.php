<?php

 // セッション開始
session_start();
 // 既にログインしている場合にはメインページに遷移
 if (isset($_SESSION["email"])) {
header('Location: index.html');
 exit;
 }

$db['host'] = '127.0.0.1';
$db['user'] = 'root';
$db['pass'] = 'root';
$db['dbname'] = 'sample_db';
$error = '';
 // ログインボタンが押されたら
<<<<<<< HEAD
 if (isset($_POST['login'])) {
=======

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
>>>>>>> 5989d2c1c482c88ed913c85cc60f11a3b4eab238
 if (empty($_POST['email'])) {
$error = 'ユーザーIDが未入力です。';
 } else if (empty($_POST['password'])) {
$error = 'パスワードが未入力です。';
 }
 if (!empty($_POST['email']) && !empty($_POST['password'])) {
$username = $_POST['email'];
<<<<<<< HEAD
$dsn = sprintf('mysql:dbname = sample_db; host=localhost;port = 8889; charset=utf8', $db['host'], $db['dbname']);
=======
$dsn = sprintf('mysql:dbname = sample_db; host= 127.0.0.1 ;port = 8889; charset=utf8');
>>>>>>> 5989d2c1c482c88ed913c85cc60f11a3b4eab238
 try {
$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$stmt = $pdo->prepare('SELECT * FROM users WHERE name = ?');
$sth->bindValue(1 , "kanimiso");
$stmt->execute();
$password = $_POST['password'];
$result = $stmt->fetch(PDO::FETCH_ASSOC);
 if (password_verify($password, $result['password'])) {
$_SESSION['email'] = $email;
<<<<<<< HEAD
header('Location: index.html');
=======
header('Location: index　.html');
>>>>>>> 5989d2c1c482c88ed913c85cc60f11a3b4eab238
 exit();
 } else {
$error = 'ユーザーIDあるいはパスワードに誤りがあります。';
 }
 } catch (PDOException $e) {
echo $e->getMessage();
 }
 }
 }
?>
