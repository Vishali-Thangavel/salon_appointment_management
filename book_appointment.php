<?php $title='Book Appointment'; include 'includes/header.php'; need_user();
$services=$pdo->query("SELECT * FROM services ORDER BY category,name")->fetchAll(); $stylists=$pdo->query("SELECT * FROM stylists ORDER BY name")->fetchAll();
$me=$pdo->prepare("SELECT name,phone FROM users WHERE id=?"); $me->execute([$_SESSION['uid']]); $me=$me->fetch();
$slots=['10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00']; $m=''; $done=null;
if($_SERVER['REQUEST_METHOD']=='POST'){
 $sv=(int)$_POST['service'];$sy=(int)$_POST['stylist'];$d=$_POST['date'];$t=$_POST['time'];$n=trim($_POST['name']);$ph=trim($_POST['phone']);$rq=trim($_POST['request']);
 $ts=strtotime("$d $t");
 if(!$sv||!$sy||!$n||!preg_match('/^[6-9]\d{9}$/',$ph)||!in_array($t,$slots)||!$ts||$ts<time()) $m='<div class="msg err">Please complete all fields with a valid future date/time.</div>';
 else{ $c=$pdo->prepare("SELECT id FROM appointments WHERE stylist_id=? AND appt_date=? AND appt_time=? AND status<>'Cancelled'");$c->execute([$sy,$d,$t]);
  if($c->fetch()) $m='<div class="msg err">Sorry, that stylist is already booked at that time. Please choose another slot.</div>';
  else{ $pdo->prepare("INSERT INTO appointments(user_id,service_id,stylist_id,appt_date,appt_time,customer_name,phone,request) VALUES(?,?,?,?,?,?,?,?)")->execute([$_SESSION['uid'],$sv,$sy,$d,$t,$n,$ph,$rq]);
   $id=$pdo->lastInsertId(); $q=$pdo->prepare("SELECT a.*,s.name sname,st.name stname FROM appointments a JOIN services s ON s.id=a.service_id JOIN stylists st ON st.id=a.stylist_id WHERE a.id=?");$q->execute([$id]);$done=$q->fetch(); } } } ?>
<div class="box" style="max-width:640px"><h2>Book an Appointment</h2>
<?php if($done): ?><div class="ok-box"><h3>Appointment Booked Successfully!</h3><p><b>Appointment ID:</b> APT-<?= str_pad($done['id'],4,'0',STR_PAD_LEFT) ?><br><b>Service:</b> <?= e($done['sname']) ?><br><b>Stylist:</b> <?= e($done['stname']) ?><br><b>Date:</b> <?= e($done['appt_date']) ?><br><b>Time:</b> <?= e(substr($done['appt_time'],0,5)) ?><br><b>Status:</b> <?= e($done['status']) ?></p></div><a class="btn" href="my_appointments.php">View My Appointments</a>
<?php else: echo $m; ?><form method="post" id="bookForm">
<label>Service</label><select name="service" required><option value="">-- Select --</option><?php foreach($services as $s): ?><option value="<?= $s['id'] ?>" <?= (($_POST['service']??$_GET['service']??0)==$s['id'])?'selected':'' ?>><?= e($s['name']) ?> — ₹<?= number_format($s['price']) ?></option><?php endforeach; ?></select>
<label>Stylist</label><select name="stylist" required><option value="">-- Select --</option><?php foreach($stylists as $s): ?><option value="<?= $s['id'] ?>" <?= (($_POST['stylist']??$_GET['stylist']??0)==$s['id'])?'selected':'' ?>><?= e($s['name']) ?> (<?= e($s['specialization']) ?>)</option><?php endforeach; ?></select>
<label>Date</label><input type="date" name="date" id="date" min="<?= date('Y-m-d') ?>" required>
<label>Time</label><select name="time" required><option value="">-- Select --</option><?php foreach($slots as $s): ?><option><?= $s ?></option><?php endforeach; ?></select>
<label>Your Name</label><input name="name" value="<?= e($me['name']) ?>" required><label>Phone</label><input name="phone" maxlength="10" value="<?= e($me['phone']) ?>" required>
<label>Special Request</label><textarea name="request" rows="3"></textarea><button class="btn">Confirm Booking</button></form><?php endif; ?></div>
<?php include 'includes/footer.php'; ?>
