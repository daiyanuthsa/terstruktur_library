<?php
function read()
{
    $link = mysqli_connect("127.0.0.1", "root", "", "perpus_terstruktur");
    $query = "SELECT c.idCART, b.idbuku, b.judul FROM CART c JOIN buku b ON c.buku_idbuku = b.idbuku;";
    $result = mysqli_query($link, $query);
    $listcart = [];
    while ($row = mysqli_fetch_array($result)) {
        $listcart[] = $row;
    }
    mysqli_close($link);
    echo "<table border=1>";
    echo "<tr>
                <td>No</td>
                <td>ID</td>
                <td> Judul </td>
                <td style='width:60px'></td>
            </tr>";
    $i = 0;
    
    foreach ($listcart as $row) {
        echo "<tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td> $row[2] </td>
                    <td>
                        <a href='./pinjam.php?fitur=delete&idbuku=$row[0]'>hapus
                    </td>
                  </tr>";
        $i++;
    }
    echo "</table>";
    echo "<a href='../fitur.php'>CARI</a> <br>";
    echo "<a href='pinjam.php?fitur=save'>SIMPAN</a>";
    
    
}
?>