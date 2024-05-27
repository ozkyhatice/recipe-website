<?php
session_start();
include("../baglanti.php");

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipe_id = $_POST['recipe_id'];
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM user_favorites WHERE user_id = '$user_id' AND recipe_id = '$recipe_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: my_favorites.php"); 
        exit();
    } else {
        echo "Hata: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} 
?>