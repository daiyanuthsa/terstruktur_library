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
    echo '<html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Perpustakaan</title>
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
                <link rel="stylesheet" href="style.css">
                
            </head>
            <body>
                <div class="sidenav">
                <img class="logo" src="pic1.png" alt="pic1">
                <a href="../fitur.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                    </svg> Home</a>
                <a href="./pinjam.php?fitur=read" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                    <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                    </svg> Keranjang Buku</a>
                </div>';
                echo '<div class="content" id="home-content" >';
    echo "<table border=1>";
    echo "<tr>
                <td>No</td>
                <td>ID</td>
                <td> Judul </td>
                <td style='width:auto'></td>
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
    echo '</div><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>';
    
    
}
?>