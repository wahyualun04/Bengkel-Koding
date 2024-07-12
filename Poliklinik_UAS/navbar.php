<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="medicalife.png"  width="100" height="40" alt="">
    </a>
    <button class="navbar-toggler"
    type="button" data-bs-toggle="collapse"
    data-bs-target="#navbarNavDropdown"
    aria-controls="navbarNavDropdown" aria-expanded="false"
    aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">
            Home
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button"
          data-bs-toggle="dropdown" aria-expanded="false">
            Data Master
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="index.php?page=dokter">
                Dokter
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="index.php?page=pasien">
                Pasien
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="index.php?page=obat">
                Obat
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" 
          href="index.php?page=periksa">
            Periksa
          </a>
        </li>
      </ul>

      <?php
      // Memeriksa apakah pengguna sudah login, jika tidak, arahkan kembali ke halaman login
      session_start();
      // NO
      if(!isset($_SESSION["username"])){
      ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" 
            href="index.php?page=loginUser">
              Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" 
            href="index.php?page=registrasiUser">
              Register
            </a>
          </li>
        </ul>
      <?php
      }else{?>
      <!-- YES -->
      <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-link">
              Hi, <?php echo $_SESSION['username']; ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" 
            href="logout.php">
              Logout
            </a>
          </li>
        </ul>
      <?php 
      }
      ?> 
    </div>
  </div>
</nav>