<?php $title='My Appointments'; include 'includes/header.php'; need_user(); $uid=$_SESSION['uid']; $m='';
if(isset($_GET['cancel'])){ $r=$pdo->prepare("UPDATE appointments SET status='Cancelled' WHERE id=? AND user_id=? AND status='Pending'");$r->execute([(int)$_GET['cancel'],$uid]); $m=$r->rowCount()?'<div class="msg ok">Appointment cancelled.</div>':'<div class="msg err">Only pending appointments can be cancelled.</div>'; }
$u=$pdo->prepare("SELECT * FROM users WHERE id=?");$u->execute([$uid]);$u=$u->fetch();
$q=$pdo->prepare("SELECT a.*,s.name sname,st.name stname FROM appointments a JOIN services s ON s.id=a.service_id JOIN stylists st ON st.id=a.stylist_id WHERE a.user_id=? ORDER BY a.appt_date DESC,a.appt_time DESC");$q->execute([$uid]);$all=$q->fetchAll();
$today=date('Y-m-d'); $next=null; foreach(array_reverse($all) as $a){ if($a['appt_date']>=$today&&in_array($a['status'],['Pending','Confirmed'])){$next=$a;break;} } ?>
<section class="sec" style="padding:40px 0"><div class="wrap"><h2>👋 Welcome, <?= e($u['name']) ?></h2><p class="sub">📧 <?= e($u['email']) ?> · 📞 <?= e($u['phone']) ?></p><?= $m ?>
<div class="grid3" style="margin-bottom:30px"><div class="stat"><b><?= count($all) ?></b>Total Bookings</div>
<div class="stat"><b style="font-size:1.1rem"><?= $next? e($next['sname']).'<br>'.e($next['appt_date']).' '.e(substr($next['appt_time'],0,5)) : 'None' ?></b>📅 Upcoming Appointment</div>
<div class="stat"><a class="btn" href="book_appointment.php">➕ Quick Book</a></div></div>
<h3 style="margin-bottom:10px">All Appointments</h3><div class="tw"><table><tr><th>ID</th><th>Service</th><th>Stylist</th><th>Date</th><th>Time</th><th>Status</th><th></th></tr>
<?php foreach($all as $a): ?><tr><td>APT-<?= str_pad($a['id'],4,'0',STR_PAD_LEFT) ?></td><td><?= e($a['sname']) ?></td><td><?= e($a['stname']) ?></td><td><?= e($a['appt_date']) ?></td><td><?= e(substr($a['appt_time'],0,5)) ?></td><td><span class="badge <?= strtolower($a['status']) ?>"><?= e($a['status']) ?></span></td>
<td><?php if($a['status']=='Pending'): ?><a class="btn sm red" data-confirm="Cancel this appointment?" href="?cancel=<?= $a['id'] ?>">Cancel</a><?php endif; ?></td></tr><?php endforeach; if(!$all) echo '<tr><td colspan="7">No appointments yet.</td></tr>'; ?></table></div></div></section>
<?php include 'includes/footer.php'; ?>
