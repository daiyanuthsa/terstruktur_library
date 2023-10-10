<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<?php
    // Inisialisasi variabel untuk mengidentifikasi tautan mana yang diklik
    $activeTab = "home"; // Default: Tampilkan tampilan home

    if (isset($_GET['tab'])) {
        $activeTab = $_GET['tab'];

        // Validasi untuk memastikan hanya tampilkan home atau keranjang buku
        if ($activeTab != "home" && $activeTab != "keranjang") {
            $activeTab = "home"; // Default: Tampilkan tampilan home jika tautan tidak valid
        }
    }
?>

<div class="sidenav">
      <img class="logo" src="asset/pic1.png" alt="pic1">
      <a href="?tab=home"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
</svg> Home</a>
      <a href="?tab=keranjang" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
  <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
</svg> Keranjang Buku</a>
    </div>

    <div class="navbar"> 
      <div class="input-group mb-3 text-center">
        <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></span>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Mau cari buku apa hari ini?">
        </div>
      </div>
    </div>
    
    <!-- Konten Halaman yang ditampilin kalo pilih home -->
    <div class="content" id="home-content" <?php if ($activeTab != "home") { echo 'style="display: none;"'; } ?>>
      <div class="banner">
        <h2>Halo!</h2>
        <h5>Eksplor buku terbaru hanya untuk kamu</h5>
    </div>

    <div class="borrowed shadow p-3 mb-5 bg-body-tertiary rounded">
      <h4 class="fw-bold">Buku yang sedang dipinjam</h4>
      <div class="cards">
      <div class="borrowed-card">
        <img src="asset/book-cover.png" alt="book-cover">
        <div class="book-desc">
          <h6>100 Years of Solitude</h6>
          <p>R.A Kartini - 2005</p>
          <p>Durasi Peminjaman : 2 Hari</p>
          <button type="button" class="btn btn-dark">Kembalikan</button>
        </div>
      </div>
      
      <div class="borrowed-card">
        <img src="asset/book-cover.png" alt="book-cover">
        <div class="book-desc">
          <h6>100 Years of Solitude</h6>
          <p>R.A Kartini - 2005</p>
          <p>Durasi Peminjaman : 2 Hari</p>
          <button type="button" class="btn btn-dark">Kembalikan</button>
        </div>
      </div>

      <div class="borrowed-card">
        <img src="asset/book-cover.png" alt="book-cover">
        <div class="book-desc">
          <h6>100 Years of Solitude</h6>
          <p>R.A Kartini - 2005</p>
          <p>Durasi Peminjaman : 2 Hari</p>
          <button type="button" class="btn btn-dark">Kembalikan</button>
        </div>
      </div>

      <div class="borrowed-card">
        <img src="asset/book-cover.png" alt="book-cover">
        <div class="book-desc">
          <h6>100 Years of Solitude</h6>
          <p>R.A Kartini - 2005</p>
          <p>Durasi Peminjaman : 2 Hari</p>
          <button type="button" class="btn btn-dark">Kembalikan</button>
        </div>
      </div>
      </div>
    </div>

    <div>
      <div class="available shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="available-head">
        <h4 class="fw-bold">Buku Tersedia</h4>
        <a href="" class="more">More Books Here > </a>
        </div>
      
      <div class="available-cards">

      <div class="available-card">
        <img src="asset/book-cover.png" alt="book-cover">
        <div class="book-desc">
          <h6>100 Years of Solitude</h6>
          <p>R.A Kartini - 2005</p>
          <button type="button" class="btn btn-dark">Add To Cart</button>
        </div>
      </div>

      <div class="available-card">
        <img src="asset/book-cover.png" alt="book-cover">
        <div class="book-desc">
          <h6>100 Years of Solitude</h6> 
          <p>R.A Kartini - 2005</p>
          <button type="button" class="btn btn-dark">Add To Cart</button>
        </div>
      </div>

      <div class="available-card">
        <img src="asset/book-cover.png" alt="book-cover">
        <div class="book-desc">
          <h6>100 Years of Solitude</h6> 
          <p>R.A Kartini - 2005</p>
          <button type="button" class="btn btn-dark">Add To Cart</button>
        </div>
      </div>

      <div class="available-card">
        <img src="asset/book-cover.png" alt="book-cover">
        <div class="book-desc">
          <h6>100 Years of Solitude</h6> 
          <p>R.A Kartini - 2005</p>
          <button type="button" class="btn btn-dark">Add To Cart</button>
        </div>
      </div>
      </div>
    </div>
  </div>
    </div>

    <!-- Konten Halaman yang ditampilin kalo pilih Keranjang -->
    <div class="content" id="keranjang-content" <?php if ($activeTab != "keranjang") { echo 'style="display: none;"'; } ?>>
      <div class="borrowed shadow p-3 mb-5 bg-body-tertiary rounded">
        <h4 class="fw-bold">KERANJANG</h4>
        <div class="cards">
        <div class="borrowed-card">
          <img src="asset/book-cover.png" alt="book-cover">
          <div class="book-desc">
            <h6>100 Years of Solitude</h6>
            <p>R.A Kartini - 2005</p>
            <p>Durasi Peminjaman : 2 Hari</p>
            <button type="button" class="btn btn-dark">Kembalikan</button>
          </div>
        </div>
        <div class="borrowed-card">
          <img src="asset/book-cover.png" alt="book-cover">
          <div class="book-desc">
            <h6>100 Years of Solitude</h6>
            <p>R.A Kartini - 2005</p>
            <p>Durasi Peminjaman : 2 Hari</p>
            <button type="button" class="btn btn-dark">Kembalikan</button>
          </div>
        </div>
        </div>
      </div>
    </div>

    <!-- Mengimpor Bootstrap JS dan jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>