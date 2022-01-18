<html>

    <head>

        <meta charset="UTF-8">
        <title> Portal społecznościowy </title>
        <link rel="stylesheet" href="./styl5.css">

    </head>

    <body>

        <section id="baner1">

            <h2> Nasze osiedle </h2>

        </section>

        <section id="baner2">

            <?php
            
                $con = mysqli_connect('localhost', 'root', '', 'portal');

                $query = "SELECT COUNT(*) FROM dane;";

                $res = mysqli_query($con, $query);

                while($e = mysqli_fetch_row($res)) {

                    echo "<h5> Liczba użytkowników portalu: $e[0] </h5>";

                }

                mysqli_close($con);

            ?>

        </section>

        <section id="lewy">

            <h3> Logowanie </h3>

            <form method="POST" action="uzytkownicy.php">

                login <br>
                <input type="text" name="login"> <br>

                hasło <br>
                <input type="password" name="haslo"> <br>
                
                <input type="submit" value="Zaloguj">

            </form>

        </section>

        <section id="prawy">

            <h3> Wizytówka </h3>

            <section id="wizytowka">

                <?php
                
                    if (!empty($_POST['login']) && !empty($_POST['haslo'])) {

                        $login = $_POST['login'];
                        $haslo = $_POST['haslo'];

                        $con = mysqli_connect('localhost', 'root', '', 'portal');

                        $query = "SELECT haslo FROM uzytkownicy WHERE login = '$login';";

                        $res = mysqli_query($con, $query);

                        $e = mysqli_fetch_assoc($res);

                        if (!$e) {

                            echo "login nie istnieje";

                        } else {

                            if (sha1($haslo) == $e['haslo']) {

                                $query = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy, dane WHERE uzytkownicy.id = dane.id AND uzytkownicy.login = '$login';";

                                $res = mysqli_query($con, $query);

                                $data = mysqli_fetch_assoc($res);

                                $obraz = $data['zdjecie'];

                                $now = date('Y');
                                $wiek = $now - $data['rok_urodz'];
                                
                                $hobby = $data['hobby'];

                                $przyjaciele = $data['przyjaciol'];

                                echo "<img src='./$obraz' alt='osoba'>";
                                echo "<h4> $login ($wiek) </h4>";
                                echo "<p> hobby: $hobby </p>";
                                echo "<h1> <img src='./icon-on.png'> $przyjaciele </h1>";
                                echo "<a href='./dane.html'> <button id='przycisk'> Więcej informacji </button> </a>";

                            } else {

                                echo "hasło nieprawidłowe";

                            }

                        }

                        mysqli_close($con);

                    }
                
                ?>

            </section>

        </section>

        <footer>

            Stronę wykonał: 00000000000 (Mateusz#4711)

        </footer>

    </body>

</html>