<?php // Run ONCE after importing the SQL: http://localhost/salon-appointment-management/setup.php
require 'config/database.php';
$pdo->prepare("INSERT IGNORE INTO admins(name,email,password) VALUES(?,?,?)")->execute(['Administrator','admin@salon.com',password_hash('admin123',PASSWORD_DEFAULT)]);
$pdo->prepare("INSERT IGNORE INTO users(name,email,phone,password) VALUES(?,?,?,?)")->execute(['Demo Customer','customer@salon.com','9876543210',password_hash('customer123',PASSWORD_DEFAULT)]);
echo "<h2>Setup complete ✔</h2><p>Admin: admin@salon.com / admin123<br>Customer: customer@salon.com / customer123</p><p><a href='index.php'>Go to website</a></p>";
