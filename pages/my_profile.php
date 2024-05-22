<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../navbar2.css">
    <link rel="stylesheet" href="../styles/my_profile.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: auto;
        }
        body {
            font-family: 'Poetsen One', sans-serif;
            display: flex;
            flex-direction: column;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            flex-grow: 1;
        }
        form {
            margin-top: 20px;
        }
        label {
            margin-top: 10px;
        }
        input[type="submit"] {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php
include("../navbar2.php");
session_start();
include("../baglanti.php");

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
    exit;
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $ad = $row['name'];
    $soyad = $row['surname'];
    $email = $row['email'];
    $telefon = $row['tel'];
?>
<div class="container">
    <h1>My Profile</h1>
    <p><strong>Ad:</strong> <?php echo $ad; ?></p>
    <p><strong>Soyad:</strong> <?php echo $soyad; ?></p>
    <p><strong>Kullanıcı Adı:</strong> <?php echo $username; ?></p>
    <p><strong>E-posta:</strong> <?php echo $email; ?></p>
    <p><strong>Telefon:</strong> <?php echo $telefon; ?></p>

    <h2>Güncelle</h2>
    <form action="update_profile.php" method="post">
        <label for="ad">Ad:</label>
        <input type="text" id="ad" name="ad" value="<?php echo $ad; ?>" class="form-control"><br>

        <label for="soyad">Soyad:</label>
        <input type="text" id="soyad" name="soyad" value="<?php echo $soyad; ?>" class="form-control"><br>

        <label for="email">E-posta:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="form-control"><br>

        <label for="telefon">Telefon:</label>
        <input type="tel" id="telefon" name="telefon" value="<?php echo $telefon; ?>" class="form-control"><br>

        <label for="password">Şifre:</label>
        <input type="password" id="password" name="password" placeholder="Yeni şifrenizi girin" class="form-control"><br>
        <label for="password_confirm">Şifre Tekrar:</label>
        <input type="password" id="password_confirm" name="password_confirm" placeholder="Yeni şifrenizi tekrar girin" class="form-control"><br>

        <input type="submit" value="Güncelle" class="btn btn-primary">
    </form>
    <?php
        if (isset($_POST['password']) && isset($_POST['password_confirm'])) {
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];

            if ($password != $password_confirm) {
                echo "<p style='color: red;'>Şifreler eşleşmiyor. Lütfen aynı şifreyi iki kez girin.</p>";
            }
        }
    ?>
    <!-- Dummy content to ensure the page is scrollable -->
    <div ></div>
</div>
<?php
} else {
    echo "<div class='container'><p>Kullanıcı bilgileri bulunamadı.</p></div>";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
