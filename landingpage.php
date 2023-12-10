<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/landingpage.css">
  <link rel="stylesheet" href="style/header.css">

  <style>
  .hero {
  min-height: 80vh;
  align-items: center;
  background-image: url("img/page.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  position: relative;
}
.features {
  background: none;
}
.hero::before {
  content: "";
  display: block;
  position: absolute;
  width: 100%;
  height: 30%;
  bottom: 0;
  background: linear-gradient(
    0deg,
    rgba(1, 1, 3, 1) 8%,
    rgba(255, 255, 255, 0) 10%
  );
}
  </style>
  <title>Ruang Baca</title>

</head>

<body>

  <?php include("komponen/header.php"); ?>
<section class="hero">
  <div class="logo-container">
    <img class="logo" src="img/logo.png" alt="Logo Website">
  </div>
  <div class="website-names">
    <div class="website-name1">Ruang Baca</div>
  </div>

  <div class="features">
    <div class="feature-container"><a href="fitur/katalog.php">Katalog</a></div>
    <div class="feature-container"><a href="fitur/repository.php">Repository</a></div>
    <div class="feature-container"><a href="fitur/peraturan.php">Peraturan</a></div>
  </div>
  </section>
  <?php include('fitur/aboutUs.php'); ?>

</body>

</html>