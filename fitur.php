<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perpustakaan</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="style.css">
        
    </head>
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
        <!-- Mengimpor Bootstrap JS dan jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>