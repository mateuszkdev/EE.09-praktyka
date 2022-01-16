<html>

    <head>

        <meta charset="UTF-8">
        <title> Mój kalendarz </title>
        <link rel="stylesheet" href="./styl5.css">

    </head>

    <body>

        <section id="baner1">

            <img src="./logo1.png" alt="Mój kalendarz">

        </section>

        <section id="baner2">

            <h1> KALENDARZ </h1>

            <?php
            
                $con = mysqli_connect('localhost', 'root', '', 'egzamin');

                $query = "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-07-01';";

                $res = mysqli_query($con, $query);

                while($e = mysqli_fetch_assoc($res)) {

                    $miesiac = $e['miesiac'];
                    $rok = $e['rok'];

                    echo "<h3> miesiąc: $miesiac, rok: $rok </h3>";

                }

                mysqli_close($con);

            ?>

        </section>

        <main>
            
            <?php

                $con = mysqli_connect('localhost', 'root', '', 'egzamin');

                $query = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'lipiec';";

                $res = mysqli_query($con, $query);

                while($e = mysqli_fetch_assoc($res)) {

                    $data = $e['dataZadania'];
                    $wpis = $e['wpis'];

                    echo "<section class='card'>";
                    echo "<h5> $data </h5>";
                    echo "<p> $wpis </p>";
                    echo "</section>";

                }

                mysqli_close($con);

            ?>

        </main>

        <footer>

            <form method="POST" action="kalendarz.php">

                dodaj wpis: <input type="text" name="wpis">
                <input type="submit" value="DODAJ">

            </form>

            <?php
            
                if (isset($_POST['wpis'])) {

                    $wpis = $_POST['wpis'];

                    $con = mysqli_connect('localhost', 'root', '', 'egzamin');

                    $query = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-07-13';";

                    mysqli_query($con, $query);
                    mysqli_close($con);

                }

            ?>

            <p> Stronę wykonał: 00000000000 (Mateusz#4711) </p>

        </footer>

    </body>

</html>