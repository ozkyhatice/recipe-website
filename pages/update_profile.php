<?php
session_start();
include("../baglanti.php");

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
    exit;
}

$username = $_SESSION['username'];

$ad = $_POST['ad'];
$soyad = $_POST['soyad'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$new_password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($new_password != $password_confirm) {
    $_SESSION['update_error'] = "Şifreler eşleşmiyor. Lütfen aynı şifreyi iki kez girin.";
    header("Location: ./my_profile.php");
    exit;
}

$sql = "UPDATE users SET name='$ad', surname='$soyad', email='$email', tel='$telefon', password='$new_password' WHERE username='$username'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['success_message'] = "Profil başarıyla güncellendi.";
    header("Location: ./my_profile.php");
    exit;
} else {
    $_SESSION['update_error'] = "Profil güncellenirken bir hata oluştu.";
    header("Location: ./my_profile.php");
    exit;
}

mysqli_close($conn);
?>
