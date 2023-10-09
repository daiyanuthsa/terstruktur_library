<?php 
function kembali($peminjaman_id, $idbuku){
    $link = mysqli_connect("127.0.0.1", "root", "", "perpus_terstruktur");
    $query = "DELETE FROM dipinjam WHERE buku_id = $idbuku AND peminjaman_id = $peminjaman_id";
    mysqli_query($link, $query);
    mysqli_close($link);
}
?>