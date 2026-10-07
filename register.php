<?php $title='Register'; include 'includes/header.php'; $m='';
if($_SERVER['REQUEST_METHOD']=='POST'){ $n=trim($_POST['name']);$em=trim($_POST['email']);$ph=trim($_POST['phone']);$pw=$_POST['password'];
 if(!$n||!filter_var($em,FILTER_VALIDATE_EMAIL)||!preg_match('/^[6-9]\d{9}$/',$ph)||strlen($pw)<6||$pw!==$_POST['confirm']) $m='<div class="msg err">Please check all fields (valid email, 10-digit phone, matching password of 6+ chars).</div>';
 else{ $c=$pdo->prepare("SELECT id FROM users WHERE email=?");$c->execute([$em]);
  if($c->fetch()) $m='<div class="msg err">Email already registered.</div>';
  else{ $pdo->prepare("INSERT INTO users(name,email,phone,password) VALUES(?,?,?,?)")->execute([$n,$em,$ph,password_hash($pw,PASSWORD_DEFAULT)]); $m='<div class="msg ok">Registered! <a href="login.php"><b>Login now</b></a></div>'; } } } ?>
<div class="box"><h2>Create Account</h2><?= $m ?><form method="post" id="regForm"><label>Full Name</label><input name="name" required><label>Email</label><input type="email" name="email" required><label>Phone</label><input name="phone" maxlength="10" required><label>Password</label><input type="password" name="password" required><label>Confirm Password</label><input type="password" name="confirm" required><button class="btn">Register</button></form></div>
<?php include 'includes/footer.php'; ?>
