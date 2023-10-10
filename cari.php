<?php
function cari($keyword)
{
    $link = mysqli_connect(
        "127.0.0.1",
        "root",
        "",
        "perpus_terstruktur"
    );
    $query = "SELECT b.idbuku, b.judul, b.PENERBIT
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
                JOIN buku b ON dp.buku_idbuku = b.idbuku
                JOIN peminjaman p ON dp.peminjaman_idpeminjaman = p.idpeminjaman
                WHERE p.tanggal_kembali IS NULL";
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
        echo "<tr>
            <td style='text-align: center;'>$rowNum</td>
            <td> $row[1] </td>
            <td style='text-align: center;'>$row[2]</td>
            <td style='text-align: center;'>
                <a href='fitur.php?fitur=kembali&peminjaman_id=$row[0]&buku_id=$row[3]'>kembalikan
                </td></tr>";
        $rowNum++;
    }
    echo "</table>";

}
?>

<div class="navbar"> 
      <form class="input-group mb-3 text-center" method=get>
        <input type='submit' value="CARI"class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></input>
        <div class="form-floating">
          <input type="text" name="keyword" class="form-control" id="floatingInputGroup1" placeholder="Mau cari buku apa hari ini?">
        </div>
      </form>
    </div>

<form method=get>
    <input type='text' name="keyword" />
    <input type='submit' value="CARI" />
</form>
<a href='./pinjam/pinjam.php?fitur=read'>Lihat Keranjang</a>
<br>