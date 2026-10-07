<?php $title='Home'; include 'includes/header.php'; include 'includes/cards.php';
$pop=$pdo->query("SELECT * FROM services WHERE name IN ('Haircut','Hair Styling','Hair Coloring','Facial','Manicure','Pedicure','Party Makeup','Bridal Makeup') ORDER BY id")->fetchAll(); ?>
<section class="hero"><div class="wrap"><h1>Look Good. Feel Beautiful.</h1><p>Professional beauty and styling services tailored just for you.</p>
<a class="btn" href="book_appointment.php">Book an Appointment</a><a class="btn alt" href="services.php">Explore Services</a></div></section>
<section class="sec"><div class="wrap two"><img src="images/salon-interior.jpg" alt="Salon interior"><div><h2>About Glow Salon</h2>
<p>Step into a calm, elegant space where every visit feels special.</p><ul style="margin:14px 0 20px 20px"><li>Professional, certified stylists</li><li>Quality, skin-safe products</li><li>Comfortable, hygienic environment</li><li>Personalized services for every client</li></ul><a class="btn" href="about.php">Learn More</a></div></div></section>
<section class="sec" style="background:#fff"><div class="wrap center"><h2>Popular Services</h2><p class="sub">Our most loved treatments</p><div class="grid" style="text-align:left"><?php foreach($pop as $s) service_card($s); ?></div></div></section>
<section class="sec"><div class="wrap center"><h2>Why Choose Us</h2><p class="sub">Beauty you can trust</p><div class="grid3">
<div class="feat"><i>✂️</i><h3>Experienced Stylists</h3></div><div class="feat"><i>💎</i><h3>Premium Products</h3></div>
<div class="feat"><i>📅</i><h3>Easy Booking</h3></div><div class="feat"><i>🧼</i><h3>Hygienic Environment</h3></div></div></div></section>
<section class="sec" style="background:#fff"><div class="wrap center"><h2>Salon Gallery</h2><p class="sub">Click an image to enlarge</p><div class="gal">
<?php foreach(['salon-interior'=>'Salon interior','hair-styling'=>'Hair styling','makeup'=>'Makeup','facial'=>'Facial','manicure'=>'Manicure','bridal-makeup'=>'Customer styling'] as $f=>$a): ?><img src="images/<?= $f ?>.jpg" alt="<?= $a ?>"><?php endforeach; ?></div></div></section>
<section class="sec"><div class="wrap center"><h2>Customer Reviews</h2><p class="sub">What our clients say</p><div class="grid3">
<div class="rev">“Best haircut I've had in years. Ananya really listens.”<b>— Meena R. ★★★★★</b></div>
<div class="rev">“Priya made my wedding day look flawless. Highly recommended!”<b>— Divya S. ★★★★★</b></div>
<div class="rev">“Clean, calm and professional. Booking online was so easy.”<b>— Karthik P. ★★★★★</b></div></div></div></section>
<section class="cta"><h2>Ready for Your Next Look?</h2><a class="btn" href="book_appointment.php">Book Your Appointment</a></section>
<?php include 'includes/footer.php'; ?>
