<?php $title='Stylists'; include 'includes/header.php'; $rows=$pdo->query("SELECT * FROM stylists ORDER BY id")->fetchAll(); ?>
<section class="page-h"><h1>Meet Our Stylists</h1></section>
<section class="sec"><div class="wrap grid"><?php foreach($rows as $s): ?>
<article class="card stylist"><img src="images/<?= e($s['image']) ?>" alt="<?= e($s['name']) ?>"><div class="cb"><h3><?= e($s['name']) ?></h3><b style="color:var(--r)"><?= e($s['specialization']) ?></b>
<p><?= (int)$s['experience'] ?> Years Experience<br><?= e($s['description']) ?></p><p>📅 <?= e($s['available_days']) ?></p><a class="btn sm" href="book_appointment.php?stylist=<?= (int)$s['id'] ?>">Book with Stylist</a></div></article><?php endforeach; ?></div></section>
<?php include 'includes/footer.php'; ?>
