<?php
include 'pass.php';

$host = "localhost";
$user = "root";
$pass = $db_password;
$db = "portafoil_db";

$serverConn = mysqli_connect($host, $user, $pass);

if (!$serverConn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($serverConn, "CREATE DATABASE IF NOT EXISTS `$db`");
mysqli_close($serverConn);

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS posts (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(180) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date VARCHAR(45) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS messages (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(190) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");
























$check = mysqli_query($conn, "SHOW COLUMNS FROM posts LIKE 'date'");
if (mysqli_num_rows($check) == 0) {
    mysqli_query($conn, "ALTER TABLE posts ADD date VARCHAR(45)");
}

$check = mysqli_query($conn, "SHOW COLUMNS FROM posts LIKE 'created_at'");
if (mysqli_num_rows($check) == 0) {
    mysqli_query($conn, "ALTER TABLE posts ADD created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP");
}

mysqli_query($conn, "ALTER TABLE posts MODIFY title VARCHAR(180) NOT NULL");
mysqli_query($conn, "ALTER TABLE posts MODIFY description TEXT NOT NULL");
mysqli_query($conn, "ALTER TABLE posts MODIFY image_path VARCHAR(255) NOT NULL");
$postDateCheck = mysqli_query($conn, "SHOW COLUMNS FROM posts LIKE 'post_date'");
if (mysqli_num_rows($postDateCheck) > 0) {
    mysqli_query($conn, "UPDATE posts SET date = DATE_FORMAT(post_date, '%Y-%m-%d') WHERE (date IS NULL OR date = '') AND post_date IS NOT NULL");
    mysqli_query($conn, "ALTER TABLE posts DROP COLUMN post_date");
}
mysqli_query($conn, "UPDATE posts SET date = DATE_FORMAT(CURDATE(), '%Y-%m-%d') WHERE date IS NULL OR date = ''");
mysqli_query($conn, "ALTER TABLE posts MODIFY date VARCHAR(45) NOT NULL");

if (!is_dir("uploads")) {
    mkdir("uploads");
}
?>
