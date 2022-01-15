<?php

    $con = mysqli_connect('localhost', 'root', '', 'egzamin06_19_06_pogotowie');

    $nrZespolu = $_POST['nrZesolu'];
    $nrDyspozytora = $_POST['nrDyspozytora'];
    $adres = $_POST['adres'];

    $query = "INSERT INTO zgloszenia (id, ratownicy_id, dyspozytorzy_id, adres, pilne, czas_zgloszenia) VALUES (null, $nrZespolu, $nrDyspozytora, '$adres', 0, CURRENT_TIME());";

    echo "$nrZespolu, $nrDyspozytora, $adres, <br> $query";

    $res = mysqli_query($con, $query);

    mysqli_close($con);

?>