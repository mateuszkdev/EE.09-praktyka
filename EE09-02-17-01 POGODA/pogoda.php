<html>

    <head>

        <meta charset="UTF-8">
        <title> Prognoza pogody Wrocław </title>
        <link rel="stylesheet" href="./styl2.css">

    </head>

    <body>

        <section id="banerLewy">

            <img src="./logo.png" alt="meteo">

        </section>

        <section id="banerSrodkowy">

            <h1> Prognoza dla Wrocławia </h1>

        </section>

        <section id="banerPrawy">

            <p> maj, 2019 r. </p>

        </section>

        <main>

            <table>

                <tr>

                    <th> DATA </th>
                    <th> TEMPERATURA W NOCY </th>
                    <th> TEMPERATURA W DZIEŃ </th>
                    <th> OPADY [mm/h] </th>
                    <th> CIŚNIENIE [hPa] </th>

                </tr>

                <?php
                
                    $con = mysqli_connect('localhost', 'root', '', 'prognoza');
                
                    $query = "SELECT * FROM pogoda WHERE miasta_id = 1 ORDER BY data_prognozy ASC;";

                    $res = mysqli_query($con, $query);

                    while($e = mysqli_fetch_assoc($res)) {

                        echo "<tr>";

                        echo "<td>".$e['data_prognozy']."</td>";
                        echo "<td>".$e['temperatura_noc']."</td>";
                        echo "<td>".$e['temperatura_dzien']."</td>";
                        echo "<td>".$e['opady']."</td>";
                        echo "<td>".$e['cisnienie']."</td>";

                        echo "</tr>";

                    }

                    mysqli_close($con);

                ?>

            </table>

        </main>

        <section id="lewy">

            <img src="./obraz.jpg" alt="Polska, Wrocław"> 

        </section>

        <section id="prawy">

            <a href="./kwerendy.txt"> Pobierz kwerendy </a>

        </section>

        <footer>

            <a> Stronę wykonał: 00000000000 (Mateusz#4711) </a>

        </footer>

    </body>

</html>