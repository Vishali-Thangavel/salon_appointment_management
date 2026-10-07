<?php $title='Services'; include 'includes/header.php'; include 'includes/cards.php'; ?>
<section class="page-h"><h1>Our Services</h1></section>
<?php foreach(['Hair','Skin','Nails','Makeup'] as $c): $st=$pdo->prepare("SELECT * FROM services WHERE category=? ORDER BY id"); $st->execute([$c]); $rows=$st->fetchAll(); if(!$rows) continue; ?>
<section class="sec" style="padding:40px 0"><div class="wrap"><h2><?= $c ?></h2><br><div class="grid"><?php foreach($rows as $s) service_card($s); ?></div></div></section>
<?php endforeach; include 'includes/footer.php'; ?>
