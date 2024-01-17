<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
    
</head>

<body>

    <header>
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="./obraz1.jpg" alt="boisko">
    </header>

    <section id="mecze">

        <?php
        
            $con = mysqli_connect('localhost', 'root', '', 'egzamin');
            $query = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1 = 'EVG';";
            $res = mysqli_query($con, $query);

            while($e = mysqli_fetch_row($res)) {

                echo("<section class='blokskryptu'>");

                echo("<h3> $e[0] - $e[1] </h3>");
                echo("<h4> $e[2] </h4>");
                echo("<p> w dniu $e[3] </p>");

                echo("</section>");

            }

            mysqli_close($con);

        ?>

    </section>

    <main>
        <h2>Reprezentacja Polski</h2>
    </main>

    <section id="lewy">

        <a> Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy): </a>
        <form action="futbol.php" method="post">

            <input type="number" name="id">
            <input type="submit" value="Sprawdź">

        </form>

        <ul>

            <?php

                if ($_POST) {

                    $input = $_POST['id'];

                    $con = mysqli_connect('localhost', 'root', '', 'egzamin');
                    $query1 = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $input;";
                    $res1 = mysqli_query($con, $query1);

                    while($e = mysqli_fetch_row($res1)) {
                        echo("<li> <p> $e[0] $e[1] </p> </li>");
                    }

                    mysqli_close($con);

                }
            
            ?>

        </ul>

    </section>

    <section id="prawy">

        <img src="./zad1.png" alt="piłkarz">
        <a> Autor: 1234567890 </a>

    </section>

</body>

</html>