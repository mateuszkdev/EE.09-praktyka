<html>

    <head>

        <meta charset="UTF-8">
        <title> Odloty samolotów </title>
        <link rel="stylesheet" href="./styl6.css">

    </head>

    <section id="baner1">

        <h1> Odloty z lotniska </h1>

    </section>

    <section id="baner2">

        <img src="./zad6.png" alt="logotyp">

    </section>

    <main>

        <h4> tabela odlotów </h4>

        <table>

            <tr>
                <td> lp. </td>
                <td> numer rejsu </td>
                <td> czas </td>
                <td> kierunek </td>
                <td> status </td>
            </tr>

            <?php
            
                $con = mysqli_connect('localhost', 'root', '', 'egzamin');

                $query = "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC;";

                $res = mysqli_query($con, $query);

                while($e = mysqli_fetch_assoc($res)) {

                    echo "<tr>";

                    echo "<td>".$e['id']."</td>";
                    echo "<td>".$e['nr_rejsu']."</td>";
                    echo "<td>".$e['czas']."</td>";
                    echo "<td>".$e['kierunek']."</td>";
                    echo "<td>".$e['status_lotu']."</td>";

                    echo "</tr>";

                }

                mysqli_close($con);

            ?>

        </table>

    </main>

    <section id="stopka1">

        <a href="./screenshots/kw1.jpg" target="_blank"> Pobierz obraz </a>

    </section>

    <section id="stopka2">

        <?php
        
            if(isset($_COOKIE['ciastko'])) {

                echo "<p> Miło nam, że nas znowu odiwedziłeś </p>";

            } else {

                echo "<p> Dzień dobry! Sprawdź regulamin naszej strony </p>";

                setcookie('ciastko', 'a', time() + 3600 * 1000);

            }

        ?>

    </section>

    <section id="stopka3">

        Autor: 00000000000 (Mateusz#4711)

    </section>

</html>