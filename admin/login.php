<?php
session_start();

$host = "localhost";
$user = "root";
$pw = "";
$database = "toko_roti";

$db = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pw);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if (($password == $user['password']) && ($username == $user['username'])) {
        // Jika benar, redirect ke halaman selamat datang
        header("Location: dashboard-admin.php");
        exit();
    } else {
        // Jika salah, tampilkan pesan error
        echo "Username atau password salah. Silakan coba lagi.";
        echo $user['password'];
        echo $password;
        echo $stmt;
    }
}
?>

