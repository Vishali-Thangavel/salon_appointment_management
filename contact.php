<?php $title='Contact'; include 'includes/header.php'; $m='';
if($_SERVER['REQUEST_METHOD']=='POST'){ $n=trim($_POST['name']);$em=trim($_POST['email']);$ms=trim($_POST['message']);
 if($n&&filter_var($em,FILTER_VALIDATE_EMAIL)&&$ms){ $pdo->prepare("INSERT INTO contact_messages(name,email,message) VALUES(?,?,?)")->execute([$n,$em,$ms]); $m='<div class="msg ok">Thank you! We will get back to you soon.</div>'; }
 else $m='<div class="msg err">Please fill all fields with a valid email.</div>'; } ?>
<section class="page-h"><h1>Contact Us</h1></section>
<div class="box"><h2>Send a Message</h2><?= $m ?><form method="post"><label>Name</label><input name="name" required><label>Email</label><input type="email" name="email" required><label>Message</label><textarea name="message" rows="4" required></textarea><button class="btn">Send</button></form>
<p style="margin-top:18px;text-align:center">📍 12 Residency Road, Coimbatore · 📞 +91 98765 43210</p></div>
<?php include 'includes/footer.php'; ?>
