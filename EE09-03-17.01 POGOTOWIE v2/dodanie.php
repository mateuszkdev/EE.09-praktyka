<?php

    $con = mysqli_connect('localhost', 'root', '', 'ee09');

    $numerKaretki = $_POST['numerKaretki'];
    $ratownik1 = $_POST['ratownik1'];
    $ratownik2 = $_POST['ratownik2'];
    $ratownik3 = $_POST['ratownik3'];

    $query = "INSERT INTO ratownicy (id, nrKaretki, ratownik1, ratownik2, ratownik3) VALUES (NULL, $numerKaretki, '$ratownik1', '$ratownik2', '$ratownik3');";

    mysqli_query($con, $query);

    mysqli_close($con);

?>