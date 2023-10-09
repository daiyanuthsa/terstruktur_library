<?php
function save()
{
    $link = mysqli_connect("127.0.0.1", "root", "", "perpus_terstruktur");
    // Mulai transaksi
    mysqli_autocommit($link, false);

    // Ambil data dari tabel CART
    $cartQuery = "SELECT buku_idbuku FROM CART";
    $cartResult = mysqli_query($link, $cartQuery);

    
    // Iterasi setiap buku dalam CART
    while ($row = mysqli_fetch_assoc($cartResult)) {
        $bukuId = $row['buku_idbuku'];

        // Masukkan data ke dalam tabel peminjaman
        $insertPeminjamanQuery = "INSERT INTO peminjaman (tanggal_ambil, tanggal_kembali) VALUES ( CURRENT_TIMESTAMP, NULL)";
        mysqli_query($link, $insertPeminjamanQuery);

        // Ambil ID peminjaman terakhir
        $lastPeminjamanId = mysqli_insert_id($link);

        // Masukkan data ke dalam tabel dipinjam
        $insertDipinjamQuery = "INSERT INTO dipinjam (peminjaman_idpeminjaman, buku_idbuku, hari) VALUES ($lastPeminjamanId, $bukuId, 2)";
        mysqli_query($link, $insertDipinjamQuery);

        // Hapus buku dari tabel CART
        $deleteCartQuery = "DELETE FROM CART WHERE buku_idbuku = $bukuId";
        mysqli_query($link, $deleteCartQuery);
    }

    // Commit transaksi
    mysqli_commit($link);

    // Tutup koneksi
    mysqli_close($link);
    
}
?>