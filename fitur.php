<html>
    <body>
<?php
include "cari.php";
include "kembali.php";
$fitur = $_GET['fitur'] ?? null;
switch ($fitur) {
    case 'pinjam':
        header('location:pinjam/pinjam.php?fitur=read');
        exit;
    case 'kembali':
        $peminjaman_id = $_GET['peminjaman_id'];
        $buku_id = $_GET['buku_id'];
        kembali($peminjaman_id, $buku_id);
        header('location:http://localhost:8080/perpustakaan_terstruktur');
        break;
    case 'cari':
    default:
        $keyword = $_GET['keyword'] ?? null;
        $listbuku = cari($keyword);
        display($listbuku);
        displayPinjam();
        break;
}
?>
    </body>
</html>