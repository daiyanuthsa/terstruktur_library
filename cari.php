<?php
function cari($keyword)
{
    $link = mysqli_connect(
        "127.0.0.1",
        "root",
        "",
        "perpus_terstruktur"
    );
    $query = "SELECT idbuku, judul, PENERBIT FROM buku WHERE judul LIKE '%$keyword%' ";
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
    echo "<br><table border=1 style='width:50%'>";
    echo "<tr>
        <th style='width:10%'>ID</th>
        <th style='width:60%'> Judul </th>
        <th></th>
        </tr>";
    foreach ($listbuku as $row) {
        echo "<tr>
                <td style='text-align: center;'>$row[0]</td>
                <td> $row[1] </td>
                <td style='text-align: center;'>
                <a href='./pinjam/pinjam.php?fitur=add&idbuku=$row[0]&judul=$row[1]'>pinjam</td>
             </tr>";
    }
    echo "</table>";
}

function displayPinjam()
{
    $link = mysqli_connect("127.0.0.1", "root", "", "perpus_terstruktur");
    $query = "SELECT dp.peminjaman_idpeminjaman AS peminjaman_id, 
       b.judul, 
       dp.hari, 
       dp.buku_idbuku AS buku_id
FROM dipinjam dp
JOIN buku b ON dp.buku_idbuku = b.idbuku;";
    $result = mysqli_query($link, $query);
    $listPinjam = [];
    while ($row = mysqli_fetch_array($result)) {
        $listPinjam[] = $row;
    }
    mysqli_close($link);
    echo "<br><table border=1 style='width:50%'>";
    echo "<tr>
            <th style='width:10%'>ID</th>
            <th style='width:60%'> Judul Buku Dipinjam </th>
            <th>Jumlah Hari</th>
            <th></th>
        </tr>";
    $rowNum = 1;
    foreach ($listPinjam as $row) {
        echo "<tr><td style='text-align: center;'>$rowNum</td><td> $row[1] </td><td style='text-align: center;'>$row[2]</td><td style='text-align: center;'><a href='fitur.php?fitur=kembali&peminjaman_id=$row[0]&buku_id=$row[3]'>kembalikan</td></tr>";
        $rowNum++;
    }
    echo "</table>";

}
?>

<form method=get>
    <input type='text' name="keyword" />
    <input type='submit' value="CARI" />
</form>
<a href='./pinjam/pinjam.php?fitur=read'>Lihat Keranjang</a>
<br>