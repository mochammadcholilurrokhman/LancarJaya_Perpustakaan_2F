<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/landingpage.css">
  <link rel="stylesheet" href="style/header.css">
  <title>Ruang Baca</title>

  <style>
  .hero {
    min-height: 80vh;
    align-items: center;
    background-image: url("img/about-us.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-color: white;
    position: relative;
  }
  </style>

</head>

<body>

  <?php include("komponen/header.php"); ?>
  <section class="hero" id="home">
  <div class="logo-container">
    <img class="logo" src="img/logo1.png" alt="Logo Website">
  </div>
  <div class="website-names">
    <div class="website-name1">Ruang Baca</div>
  </div>

  <div class="features">
    <div class="feature-container"><a href="fitur/katalog.php">Katalog</a></div>
    <div class="feature-container"><a href="fitur/repository.php">Repository</a></div>
    <div class="feature-container"><a href="fitur/peraturan.php">Peraturan</a></div>
  </div>
  </div>
  </section>
  <?php include('fitur/aboutUs.php'); ?>
  
</body>

</html>