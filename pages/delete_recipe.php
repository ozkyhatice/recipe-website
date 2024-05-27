<?php
session_start(); 
include("../baglanti.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: /index.php");
    exit;
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: /index.php");
    exit;
}



$recipe_id = $_GET['recipe_id'];
$category = $_GET['category'];

$sql = "DELETE FROM recipes WHERE id = '$recipe_id'";

if (mysqli_query($conn, $sql)) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Error deleting recipe: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
