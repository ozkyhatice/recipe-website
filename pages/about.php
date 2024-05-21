<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../navbar2.css">
    <link rel="stylesheet" href="../styles/about.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
   
</head>
<body>
<?php
    // Navbar'ı çağırıyoruz
    include '../navbar2.php';
    ?>
    <div class="about-section">
  <h1>Who Are We?</h1>
  <p>We, the Hatice and Zehra Chefs, are here! We love cooking and eagerly await sharing with you. Our recipes are the kind that everyone can easily make in their kitchen. We're the place where you can find any recipe you want to try in the kitchen. Come on, let's enjoy cooking together!</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="../images/hatice.png" alt="Hatice" style="width:100%">
      <div class="container">
        <h2>Hatice Özkaya</h2>
        <p class="title">Software Engineering Student</p>
        <p></p>
        <p>hatice@example.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="../images/zehra.png" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Zehra Gürbüz</h2>
        <p class="title">Software Engineering Student</p>
        <p></p>
        <p>zehra@example.com</p>
      </div>
    </div>
  </div>
</div>
</body>
</html>