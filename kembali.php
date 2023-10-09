<?php
function kembali($peminjamanId, $bukuId)
{
    $link = mysqli_connect("127.0.0.1", "root", "", "perpus_terstruktur");

    // Mulai transaksi
    mysqli_autocommit($link, false);

    // Update tanggal kembali pada tabel peminjaman
    $updatePeminjamanQuery = "UPDATE peminjaman SET tanggal_kembali = CURRENT_TIMESTAMP WHERE idpeminjaman = $peminjamanId";
    mysqli_query($link, $updatePeminjamanQuery);

    // Hapus buku dari tabel dipinjam
    // $deleteDipinjamQuery = "DELETE FROM dipinjam WHERE peminjaman_idpeminjaman = $peminjamanId AND buku_idbuku = $bukuId";
    // mysqli_query($link, $deleteDipinjamQuery);

    // Commit transaksi
    mysqli_commit($link);

    // Tutup koneksi
    mysqli_close($link);
}
?>