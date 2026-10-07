<?php $title='Login'; include 'includes/header.php'; $m='';
if($_SERVER['REQUEST_METHOD']=='POST'){ $st=$pdo->prepare("SELECT * FROM users WHERE email=?");$st->execute([trim($_POST['email'])]);$u=$st->fetch();
 if($u&&password_verify($_POST['password'],$u['password'])){ session_regenerate_id(true);$_SESSION['uid']=$u['id'];$_SESSION['uname']=$u['name']; header('Location: my_appointments.php'); exit; }
 $m='<div class="msg err">Invalid email or password.</div>'; } ?>
<div class="box"><h2>Customer Login</h2><?= $m ?><form method="post"><label>Email</label><input type="email" name="email" required><label>Password</label><input type="password" name="password" required><button class="btn">Login</button></form><p class="center" style="margin-top:14px">New here? <a href="register.php"><b>Register</b></a></p></div>
<?php include 'includes/footer.php'; ?>
