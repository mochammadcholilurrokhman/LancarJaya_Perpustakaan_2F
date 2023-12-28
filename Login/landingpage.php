<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/landingpage.css">
  <link rel="stylesheet" href="../style/header.css">

  <style>
    .website-name1 {
  font-size: 40px;
  color: #fff;
  font-weight: bold;
    }


    .hero {
      min-height: 90vh;
      align-items: center;
      background-image: url("../assets/img/page.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      position: relative;
    }

    .features {
      background: none;
      padding: 30px;
    }

    .hero::before {
      content: "";
      display: block;
      position: absolute;
      width: 100%;
      height: 30%;
      bottom: 0;
      background: linear-gradient(0deg,
          rgba(255, 255, 255, 0) 50%,
          rgba(255, 255, 255, 0) 10%);
    }
  </style>
  <title>Ruang Baca</title>

</head>

<body>

  <?php include("../App/header.php"); ?>
  <section class="hero">
    <div class="logo-container">
      <img class="logo" src="../assets/img/logo1.png" alt="Logo Website">
    </div>
    <div class="website-names">
      <div class="website-name1">Ruang Baca</div>
    </div>

    <div class="features">
      <div class="feature-container"><a href="../public/katalog.php">Katalog</a></div>
      <div class="feature-container"><a href="../public/repository.php">Repository</a></div>
      <div class="feature-container"><a href="../public/rules.php">Peraturan</a></div>
    </div>
  </section>
  <br><br>
  <?php include('../public/aboutUs.php'); ?>
</body>

</html>