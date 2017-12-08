<?php

 // セッション開始
session_start();
 // 既にログインしている場合にはメインページに遷移
 if (isset($_SESSION["email"])) {
header('Location: index.html');
 exit;
 }
$db['host'] = 'localhost';
$db['user'] = 'root';
$db['pass'] = 'root';
$db['dbname'] = 'testData';
$error = '';
 // ログインボタンが押されたら
 if (isset($_POST['login'])) {
 if (empty($_POST['email'])) {
$error = 'ユーザーIDが未入力です。';
 } else if (empty($_POST['password'])) {
$error = 'パスワードが未入力です。';
 }
 if (!empty($_POST['email']) && !empty($_POST['password'])) {
$username = $_POST['email'];
$dsn = sprintf('mysql:dbname = sample_db; host=localhost;port = 8889; charset=utf8', $db['host'], $db['dbname']);
 try {
$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$stmt = $pdo->prepare('SELECT * FROM user WHERE name = ?');
$stmt->execute(array($username));
$password = $_POST['password'];
$result = $stmt->fetch(PDO::FETCH_ASSOC);
 if (password_verify($password, $result['password'])) {
$_SESSION['email'] = $email;
header('Location: index.html');
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