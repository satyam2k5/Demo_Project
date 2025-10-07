<?php
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register - Treko</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="row justify-content-center">
<div class="col-12 col-md-8 col-lg-6">
<div class="card p-4">
<h3 class="mb-3">Create an account</h3>
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
<form method="post" novalidate>
<div class="row">
<div class="mb-3 col-md-6">
<label class="form-label">First name</label>
<input name="first_name" value="<?=htmlspecialchars($first ?? '')?>" required class="form-control">
</div>
<div class="mb-3 col-md-6">
<label class="form-label">Last name</label>
<input name="last_name" value="<?=htmlspecialchars($last ?? '')?>" required class="form-control">
</div>
</div>
<div class="mb-3">
<label class="form-label">Username</label>
<input name="username" value="<?=htmlspecialchars($username ?? '')?>" required class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Password</label>
<input id="password" name="password" type="password" required class="form-control">
<div class="form-text">Minimum 6 characters.</div>
</div>
<div class="mb-3">
<label class="form-label">Email</label>
<input name="email" value="<?=htmlspecialchars($email ?? '')?>" type="email" required class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Phone</label>
<input name="phone" value="<?=htmlspecialchars($phone ?? '')?>" class="form-control">
</div>


<div class="d-flex gap-2">
<button class="btn btn-primary">Register</button>
<a class="btn btn-outline-secondary" href="login.php">Already have an account</a>
</div>
</form>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>