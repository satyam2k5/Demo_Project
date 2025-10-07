<?php
require 'config.php';
if (empty($_SESSION['user_id'])) {
header('Location: login.php');
exit;
}


$stmt = $pdo->prepare('SELECT id, first_name, last_name, username, email, phone, created_at FROM users WHERE id = :id LIMIT 1');
$stmt->execute([':id' => $_SESSION['user_id']]);
$user = $stmt->fetch();
if (!$user) {
// user not found - force logout
header('Location: logout.php'); exit;
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home - Treko</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="row justify-content-center">
<div class="col-12 col-md-8 col-lg-6">
<div class="card p-4 mt-4">
<div class="d-flex align-items-center mb-3">
<h3 class="mb-0">Hello "<?=htmlspecialchars($user['username'])?>"</h3>
<div class="ms-auto">
<a href="logout.php" class="btn btn-sm btn-outline-danger">Logout</a>
</div>
</div>
<div class="mb-3"><strong>First name:</strong> <?=htmlspecialchars($user['first_name'])?></div>
<div class="mb-3"><strong>Last name:</strong> <?=htmlspecialchars($user['last_name'])?></div>