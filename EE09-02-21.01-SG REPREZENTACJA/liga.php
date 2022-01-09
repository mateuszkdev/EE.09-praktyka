<html>

    <head>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="./styl2.css">
        <title> piłka nożna </title>

    </head>

    <body>

        <header>

            <h3> Reprezentacja polski w piłce nożnej </h3>
            <img src="./obraz1.jpg" alt="reprezentacja">

        </header>

        <section id="lewy">

            <form method="POST" action="liga.php">

                <select name="wybor">
                    <option value="1" selected> Bramkarze </option>
                    <option value="2"> Obrońcy </option>
                    <option value="3"> Pomocnicy </option>
                    <option value="4"> Napastnicy </option>
                </select>

                <input type="submit" value="Zobacz">

            </form>

            <img src="./zad2.png" alt="piłka">

            <p> Autor: 00000000000 (Mateusz#4711) </p>

        </section>

        <section id="prawy">

            <ol>

            <?php
            
                if(isset($_POST['wybor'])) {

                    $con = mysqli_connect('localhost', 'root', '', 'egzamin02_21_01');

                    $id = $_POST['wybor'];

                    $query = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $id;";

                    $res = mysqli_query($con, $query);

                    while($line = mysqli_fetch_assoc($res)) {

                        $imie = $line['imie'];
                        $nazwisko = $line['nazwisko'];

                        echo "<li> $imie $nazwisko </li>";

                    }

                    mysqli_close($con);

                }

            ?>

            </ol>

        </section>

        <main>

            <h3> Liga mistrzów </h3>

        </main>

        <section id="liga">

            <?php
            
                $con = mysqli_connect('localhost', 'root', '', 'egzamin02_21_01');

                $query = "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC;";

                $res = mysqli_query($con, $query);

                while($line = mysqli_fetch_assoc($res)) {

                    $zespol = $line['zespol'];
                    $punkty = $line['punkty'];
                    $grupa = $line['grupa'];

                    echo "<div class='card'>";
                    echo "<h2> $zespol </h2> <h1> $punkty </h1> <p> Grupa: $grupa </p>";
                    echo "</div>";

                }

                mysqli_close($con);
            
            ?>

        </section>

    </body>

</html>