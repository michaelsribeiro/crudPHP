<?php
    include "conection.php";

    $sql = "SELECT * FROM users ORDER BY id";
    $result = mysqli_query($conn, $sql);

?>