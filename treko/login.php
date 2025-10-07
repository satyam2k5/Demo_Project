<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$errors = [];
if ($username === '' || $password === '') $errors[] = 'Please enter both username and password.';


if (empty($errors)) {
$stmt = $pdo->prepare('SELECT id, password FROM users WHERE username = :u LIMIT 1');
$stmt->execute([':u'=>$username]);
$user = $stmt->fetch();
if ($user && password_verify($password, $user['password'])) {
session_regenerate_id(true);
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $username;
header('Location: home.php');
exit;
} else {
$errors[] = 'Invalid credentials.';
}
}
}
$flash = get_flash();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login - Treko</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="row justify-content-center">
<div class="col-12 col-md-6">
<div class="card p-4 mt-4">
<h3 class="mb-3">Login</h3>
<?php if(!empty($flash)): ?>
<div class="alert alert-<?=htmlspecialchars($flash['type'])?>"><?=htmlspecialchars($flash['msg'])?></div>
<?php endif; ?>
<?php if(!empty($errors)): ?>
<div class="alert alert-danger">
<ul class="mb-0">
<?php foreach($errors as $e): ?>
<li><?=htmlspecialchars($e)?></li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>


<form method="post">
<div class="mb-3">
<label class="form-label">Username</label>
<input name="username" class="form-control" value="<?=htmlspecialchars($username ?? '')?>">
</div>
<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control">
</div>
</body>