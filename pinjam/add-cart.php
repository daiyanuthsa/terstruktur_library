<?php
function add($idbuku, $judul)
{
    $link = new mysqli(
        "127.0.0.1",
        "root",
        "",
        "perpus_terstruktur"
    );
    $query = "INSERT INTO CART (buku_idbuku) VALUES ($idbuku)";
    $result = $link->query($query);
}
?>