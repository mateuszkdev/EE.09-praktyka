<html>

    <head>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="./styl2.css">
        <title> Klub wędkowania </title>

    </head>

    <body>

        <header>

            <h2> Wędkuj z nami! </h2>

        </header>

        <section id="lewy">

            <img src="./ryba2.jpg" alt="Szczupak">

        </section>

        <section id="prawy">

            <h3> Ryby spokojnego żeru (białe) </h3>

            <?php
            
                $con = mysqli_connect('localhost', 'root', '', 'egzamin_2020_01_01');

                $query = 'SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 2;';

                $res = mysqli_query($con, $query);

                while($e = mysqli_fetch_assoc($res)) {

                    $id = $e["id"];
                    $nazwa = $e["nazwa"];
                    $wystepowanie = $e["wystepowanie"];

                    echo "<p> $id. $nazwa, występuje w: $wystepowanie </p>";

                }

                mysqli_close($con);

            ?>

            <ol>

                <li>
                    <a href="https://wedkuje.pl/" target="_blank"> Odwiedź także </a>
                </li>

                <li>
                    <a href="http://pzw.org.pl/" target="_blank"> Polski Związek Wędkarski </a>
                </li>

            </ol>

        </section>

        <footer>

            <p> Stronę wykonał: 00000000000 (Mateusz#4711) </p>

        </footer>        

    </body>

</html>