<?php
function cari($keyword)
{
    $link = mysqli_connect(
        "127.0.0.1",
        "root",
        "",
        "perpus_terstruktur"
    );
    $query = "SELECT b.idbuku, b.judul, b.PENULIS, b.cover_link
                FROM buku b
                WHERE b.idbuku NOT IN (SELECT buku_idbuku FROM CART)
                AND b.idbuku NOT IN (SELECT buku_idbuku FROM dipinjam dp
                                    JOIN peminjaman p ON dp.peminjaman_idpeminjaman = p.idpeminjaman
                                    WHERE p.tanggal_kembali IS NULL)
                AND b.judul LIKE '%$keyword%'";
    $result = mysqli_query($link, $query);
    $listbuku = []; // Initialize $listbuku as an empty array
    while ($row = mysqli_fetch_array($result)) {
        $listbuku[] = $row;
    }
    mysqli_close($link);
    return $listbuku;
}
function display($listbuku)
{
    echo '<div class="available shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="available-head">
            <h4 class="fw-bold">Buku Tersedia</h4>
            <a href="" class="more">More Books Here > </a>
            </div>
            <div class="available-cards">';
    
    foreach ($listbuku as $row) {
        echo "<div class='available-card'>
                <img src='$row[3]' alt='book-cover'>
                <div class='book-desc'>
                <h6>$row[1]</h6> 
                <p>$row[2]</p>
                <a href='./pinjam/pinjam.php?fitur=add&idbuku=$row[0]&judul=$row[1]' class='btn btn-dark'>Add To Cart</a>
                </div>
            </div>";
        
    }
    echo "</div>
      </div>";
}

function displayPinjam()
{
    $link = mysqli_connect("127.0.0.1", "root", "", "perpus_terstruktur");
    $query = "SELECT dp.peminjaman_idpeminjaman AS peminjaman_id, 
                    b.judul, 
                    dp.hari, 
                    dp.buku_idbuku AS buku_id,
                    b.cover_link,
                    b.PENULIS
                FROM dipinjam dp
                JOIN buku b ON dp.buku_idbuku = b.idbuku
                JOIN peminjaman p ON dp.peminjaman_idpeminjaman = p.idpeminjaman
                WHERE p.tanggal_kembali IS NULL";
    $result = mysqli_query($link, $query);
    $listPinjam = [];
    while ($row = mysqli_fetch_array($result)) {
        $listPinjam[] = $row;
    }
    mysqli_close($link);
    echo '<div class="borrowed shadow p-3 mb-5 bg-body-tertiary rounded">
            <h4 class="fw-bold">Buku yang sedang dipinjam</h4>
            <div class="cards">';
    $rowNum = 1;
    foreach ($listPinjam as $row) {
        echo "<div class='borrowed-card'>
                <img src='$row[4]' alt='book-cover'>
                <div class='book-desc'>
                <h6>$row[1]</h6>
                <p>$row[5]</p>
                <p>Durasi Peminjaman : $row[2] Hari</p>
                <a href='fitur.php?fitur=kembali&peminjaman_id=$row[0]&buku_id=$row[3]' class='btn btn-dark'>
                    Kembalikan
                </a>
                </div>
            </div>";
        
        $rowNum++;
    }
    echo "</div></div>";

}
?>

<div class="navbar">
    <form class="input-group mb-3 text-center" method=get>

        <div class="form-floating">
            <input type="text" name="keyword" class="form-control" id="floatingInputGroup1"
                placeholder="Mau cari buku apa hari ini?">
        </div>
        <input type='submit' value="CARI" class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
            viewBox="0 0 16 16">
            <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg>
        </input>
    </form>
</div>
<div class="content" id="home-content">
            <div class="banner">
                <h2>Halo!</h2>
                <h5>Eksplor buku terbaru hanya untuk kamu</h5>
            </div>

<!-- <form method=get>
    <input type='text' name="keyword" />
    <input type='submit' value="CARI" />
</form> -->


<br>