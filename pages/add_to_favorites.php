<?php
session_start();

if (isset($_SESSION['user_id'])) {
    include("../baglanti.php");

    $recipe_id = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'add') {
        $sql = "INSERT INTO user_favorites (user_id, recipe_id) VALUES ('" . $_SESSION['user_id'] . "', '$recipe_id')";
    } else if ($action == 'remove') {
        $sql = "DELETE FROM user_favorites WHERE user_id='" . $_SESSION['user_id'] . "' AND recipe_id='$recipe_id'";
    }
    if (mysqli_query($conn, $sql)) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    } else {
        echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "<script>
            
            if (confirm('Favorilere eklemek için önce giriş yapmalısınız.Giriş yapmak ister misiniz?')) {
                window.location.href = 'login.php';
            } else {
                window.history.back();
            }
          </script>";
        }
?>
