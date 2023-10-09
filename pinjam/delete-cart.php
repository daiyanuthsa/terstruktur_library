<?php
function delete($i )
{
    $link = new mysqli(
        "127.0.0.1",
        "root",
        "",
        "perpus_terstruktur"
    );
    $query = "DELETE FROM CART WHERE idCART = $i";
    $result = $link->query($query);
}
?>