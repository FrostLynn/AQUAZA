<?php 
require_once 'config/config.php';

if (isset($_SESSION["user"])) {
  $id = $_SESSION["user"];
  $result = query("SELECT * FROM users WHERE id_user = $id")[0];
  if ($result['roles'] == 'ADMIN') {
    header("Location: admin");
  } elseif($result["roles"] == 'OWNER') {
    header("Location: owner");
  }
}

if (isset($_SESSION["driver"])) {
  header("Location: driver");
} 


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Toko Galon Online</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="assets/style/main.css" rel="stylesheet" />

    <style>      
    .store-adventeges {
        padding: 40px;
        background-color: #F7F7E8;
      }
    </style>
  </head>

  <body>
    <!-- navbar -->
    <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href="index.php" class="navbar-brand">
          <img src="assets/images/logo.jpg" class="w-50" alt="logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive" 
          aria-expanded="false" 
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="products.php" class="nav-link">Pesan</a>
            </li>
            <li class="nav-item">
              <a href="about.php" class="nav-link">Tentang</a>
            </li>
            <?php
            if (!isset($_SESSION["login"]) && !isset($_SESSION["user"])) : ?>
              <li class="nav-item">
                <a href="register.php" class="nav-link">Sign Up</a>
              </li>
              <li class="nav-item">
                <a
                  href="login.php"
                  class="btn btn-success nav-link px-4 text-white"
                  >Sign In</a
                >
              </li>
            <?php else: ?>
              <li class="nav-item dropdown">
                <?php 
                  $id = $_SESSION["user"];
                  $user = query("SELECT * FROM users WHERE id_user = $id")[0];
                ?>
                  <a
                    href="#"
                    class="nav-link font-weight-bold"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                  >
                    <!-- <img
                      src="../assets/images/user_pc.png"
                      alt="profile"
                      class="rounded-circle mr-2 profile-picture"
                    /> -->
                    Hi, <?= $user["name"]; ?>
                  </a>
                  <div class="dropdown-menu">
                    <?php if ($user["roles"] == 'ADMIN') : ?>
                        <a href="admin" class="dropdown-item">
                          Dashboard
                        </a>
                    <?php else : ?>
                        <a href="user" class="dropdown-item">
                          Dashboard
                        </a>
                    <?php endif; ?>
                    <div class="dropdown-divider"></div>
                    <a href="logout.php" class="dropdown-item">logout</a>
                  </div>
              </li>
              <li class="nav-item">
                <?php 
                  $id = $user["id_user"];
                  $carts = rows("SELECT * FROM carts WHERE user_id = $id");
                ?>
                <?php if ($carts >= 1) : ?>
                  <a href="cart.php" class="nav-link d-inline-block">
                    <img
                      src="assets/images/shopping-cart-filled.svg"
                      alt="cart-empty"
                    />
                    <div class="cart-badge"><?= $carts; ?></div>
                  </a>
                <?php else : ?>
                  <a href="cart.php" class="nav-link d-inline-block">
                    <img
                      src="assets/images/icon-cart-empty.svg"
                      alt="cart-empty"
                    />
                  </a>
                <?php endif; ?>
              </li>
            <?php endif;?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- page content -->
    <div class="page-content page-home" data-aos="zoom-in">
      <section class="store-landing">
        <div class="container">
          <div class="row align-items-center justify-content-between">
            <div class="col-md-5">
              <img src="assets/images/bg-landing-removebg-preview.png" class="w-100" alt="" />
            </div>
            <div class="col-md-6">
              <h1 style="font-weight: bold; margin-bottom: 15px;">AQUAZA</h1>
              <p class="store-subtitle-landing" style="line-height: 28px; color: rgb(146, 146, 146);">
                AQUAZA merupakan platform website yang melayani pesan-antar galon berbasis online di lingkungan sekitar Kampus 2 Universitas Siliwangi Tasikmalaya guna memudahkan warga sekitar untuk membeli galon tanpa keluar rumah ;)
              </p>
              <a href="products.php" class="btn btn-success px-4 py-2 mt-4"
                ><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 20 20">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg> Order Now</a
              >
            </div>
          </div>
        </div>
      </section>
      <section class="store-adventeges" style="margin-top: 100px;" id="adventeges">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="title-adventeges" style="text-align: center; font-size: 24px; font-weight: 600; margin-bottom: 20px;">Kelebihan Menggunakan Website Ini</div>
            </div>
          </div>
          <div class="row">
            <div
              class="col-6 col-md-4"
              data-aos="fade-down"
              data-aos-delay="100"
            >
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row justify-content-center align-content-center">
                    <div class="col-10 col-md-4">
                      <div class="adventeges-thumbnail mb-lg-0 mb-2">
                        <img
                          src="assets/images/fast.svg"
                          class="w-100"
                          alt=""
                        />
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div
                        class="adventege-description text-center text-lg-left"
                      >
                        <div class="title-text">Faster Process</div>
                        <div class="subtitle-text">
                          Proses lebih cepat karena menggunakan sistem komputer
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="col-6 col-md-4"
              data-aos="fade-down"
              data-aos-delay="200"
            >
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row justify-content-center align-content-center">
                    <div class="col-10 col-md-4">
                      <div class="adventeges-thumbnail mb-lg-0 mb-2">
                        <img
                          src="assets/images/money.svg"
                          class="w-100"
                          alt=""
                        />
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div
                        class="adventege-description text-center text-lg-left"
                      >
                        <div class="title-text">Energy Saving</div>
                        <div class="subtitle-text">
                          Menghemat energi karena tidak perlu beranjak dari tempat
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="col-6 col-md-4"
              data-aos="fade-down"
              data-aos-delay="300"
            >
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row justify-content-center align-content-center">
                    <div class="col-10 col-md-4">
                      <div class="adventeges-thumbnail mb-lg-0 mb-2">
                        <img src="assets/images/env.svg" class="w-100" alt="" />
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div
                        class="adventege-description text-center text-lg-left"
                      >
                        <div class="title-text">Time Efficiency</div>
                        <div class="subtitle-text">
                          Waktu lebih efisien karena bisa memesan dimana saja
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- akhir slider -->

    <!-- footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p class="pt-4 pb-2">
              &copy; 2023 Copyright by AQUAZA. All Rights Reserved.
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- akhir footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.slim.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="assets/js/navbar-scroll.js"></script>
  </body>
</html>
