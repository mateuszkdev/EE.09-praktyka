<?php

    $con = mysqli_connect("localhost", "root", "", "wedkowanie");

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];

    $query = "INSERT INTO Karty_wedkarskie (id, imie, nazwisko, adres, data_zezwolenia, punkty) VALUES (NULL, '$imie', '$nazwisko', '$adres', NULL, NULL);";

    mysqli_query($con, $query);
    
    mysqli_close($con);

?>