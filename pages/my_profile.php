<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    
    <!-- FontAwesome 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../navbar2.css">
    <link rel="stylesheet" href="../styles/my_profile.css">
</head>
<body>
<?php
include("../navbar2.php");
session_start();

// Veritabanı bağlantısını burada yapmalısınız
include("../baglanti.php");

// Oturum kontrolü
if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
    exit;
}

// Kullanıcı adını al
$username = $_SESSION['username'];

// Kullanıcı bilgilerini veritabanından getir
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // Kullanıcı bilgilerini al
    $row = mysqli_fetch_assoc($result);
    $ad = $row['name'];
    $soyad = $row['surname'];
    $email = $row['email'];
    $telefon = $row['tel'];
    // Diğer bilgileri de alabilirsiniz

    // Profil bilgilerini görüntüleme formu
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Profile</title>
    </head>
    <body>
        <h1>My Profile</h1>
        <h2>Görüntüle</h2>
        <p><strong>Ad:</strong> <?php echo $ad; ?></p>
        <p><strong>Soyad:</strong> <?php echo $soyad; ?></p>
        <p><strong>Kullanıcı Adı:</strong> <?php echo $username; ?></p>
        <p><strong>E-posta:</strong> <?php echo $email; ?></p>
        <p><strong>Telefon:</strong> <?php echo $telefon; ?></p>

        <h2>Güncelle</h2>
        <form action="update_profile.php" method="post">
            <label for="ad">Ad:</label>
            <input type="text" id="ad" name="ad" value="<?php echo $ad; ?>"><br>

            <label for="soyad">Soyad:</label>
            <input type="text" id="soyad" name="soyad" value="<?php echo $soyad; ?>"><br>

            <label for="email">E-posta:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>

            <label for="telefon">Telefon:</label>
            <input type="tel" id="telefon" name="telefon" value="<?php echo $telefon; ?>"><br>

            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password" placeholder="Yeni şifrenizi girin"><br>
            <label for="password_confirm">Şifre Tekrar:</label>
            <input type="password" id="password_confirm" name="password_confirm" placeholder="Yeni şifrenizi tekrar girin"><br>

            <input type="submit" value="Güncelle">
        </form>
        <?php
            // İki şifrenin eşleşip eşleşmediğini kontrol et
            if (isset($_POST['password']) && isset($_POST['password_confirm'])) {
                $password = $_POST['password'];
                $password_confirm = $_POST['password_confirm'];
                
                if ($password != $password_confirm) {
                    echo "<p style='color: red;'>Şifreler eşleşmiyor. Lütfen aynı şifreyi iki kez girin.</p>";
                }
            }
        ?>
    </body>
    </html>
    <?php
} else {
    echo "Kullanıcı bilgileri bulunamadı.";
}
?>

</body>

</html>
