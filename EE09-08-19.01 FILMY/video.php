<body>

    <head>

        <meta charset="UTF-8">
        <title> Video On Demand </title>
        <link rel="stylesheet" href="./styl3.css">

    </head>

    <body>

        <section id="baner1">

            <h1> Internetowa wypożyczalnia filmów </h1>

        </section>

        <section id="baner2">

            <table>

                <tr>
                    <td> Kryminał </td>
                    <td> Horror </td>
                    <td> Przygodowy </td>
                </tr>
                <tr>
                    <td> 20 </td>
                    <td> 30 </td>
                    <td> 20 </td>
                </tr>

            </table>

        </section>

        <section id="polecamy">

            <h3> Polecamy </h3>

            <?php
            
                $query = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18, 22, 23, 25);";

                $con = mysqli_connect('localhost', 'root', '', 'dane3');

                $res = mysqli_query($con, $query);

                while($e = mysqli_fetch_assoc($res)) {

                    $id = $e['id'];
                    $nazwa = $e['nazwa'];
                    $zdjecie = $e['zdjecie'];
                    $opis = $e['opis'];

                    echo "<div class='card'>";

                    echo "<h4> $id. $nazwa </h4>";
                    echo "<img src='./$zdjecie' alt='film'>";
                    echo "<p> $opis </p>";

                    echo "</div>";
                }

                mysqli_close($con);

            ?>

        </section>

        <section id="filmyFantastyczne">

            <h3> Filmy fantastyczne </h3>

            <?php
            
                $query = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12;";

                $con = mysqli_connect('localhost', 'root', '', 'dane3');

                $res = mysqli_query($con, $query);

                while($e = mysqli_fetch_assoc($res)) {

                    $id = $e['id'];
                    $nazwa = $e['nazwa'];
                    $zdjecie = $e['zdjecie'];
                    $opis = $e['opis'];

                    echo "<div class='card'>";

                    echo "<h4> $id. $nazwa </h4>";
                    echo "<img src='./$zdjecie' alt='film'>";
                    echo "<p> $opis </p>";

                    echo "</div>";
                }

                mysqli_close($con);

            ?>

        </section>

        <footer>

            <form method="POST" action="video.php">

                Usuń film nr: <input type="number" name="numer">
                <input type="submit" value="Usuń film">

                <br>

                Stronę wykonał: <a href="mailto:ja@poczta.com"> 00000000000 (Mateusz#4711) </a>

            </form>

        </footer>

    </body>

</body>