<html>

    <head>
    
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./style3.css">
        <title> Twoje BMI </title>

    </head>

    <body>

        <section id="logo">

            <img src="./wzor.png" alt="wzrór BMI">

        </section>

        <section id="baner">

            <h1> Oblicz swoje BMI </h1>

        </section>

        <main>

            <table>

                <tr>
                    <td> Interpretacja BMI </td>
                    <td> Wartość minimalna </td>
                    <td> Wartość maksymalna </td>
                </tr>

                <?php
                
                    $con = mysqli_connect('localhost', 'root', '', 'egzamin03_21_01');

                    $query = 'SELECT informacja, wart_min, wart_max FROM bmi;';
                    $res = mysqli_query($con, $query);

                    while($line = mysqli_fetch_assoc($res)) {

                        $informacja = $line['informacja'];
                        $min = $line['wart_min'];
                        $max = $line['wart_max'];

                        echo "<tr>";
                        echo "<td> $informacja </td>";
                        echo "<td> $min </td>";
                        echo "<td> $max </td>";
                        echo "</tr>";

                    }

                    mysqli_close($con);

                ?>

            </table>

        </main>

        <section id="lewy">

            <h2> Podaj wagę i wzrost </h2>

            <form method="POST" action="bmi.php">

                Waga: <input type="number" name="waga" min="1"> <br>
                Wzrost w cm: <input type="number" name="wzrost" min="1"> <br>
                <input type="submit" value="Oblicz i zapamiętaj wynik">

            </form>

            <?php
            
                if (isset($_POST['waga']) && isset($_POST['wzrost'])) {
                    echo "pomidor";


                    $con = mysqli_connect('localhost', 'root', '', 'egzamin03_21_01');

                    $wzrost = $_POST['wzrost'];
                    $waga = $_POST['waga'];

                    $bmi = ($waga / ($wzrost * $wzrost)) * 10000;
                    
                    $bmi = round($bmi);

                    echo "Twoja waga: $waga; Twój wzrost: $wzrost <br>BMI wynosi: $bmi";

                    $przedzial = 0;
                    if ($bmi <= 18) $przedzial = 1;
                    else if ($bmi >= 19 && $bmi <= 25) $przedzial = 2;
                    else if ($bmi >= 26 && $bmi <= 30) $przedzial = 3;
                    else $przedzial = 4;

                    $data = date('Y-m-d');

                    $query = "INSERT INTO wynik (id, bmi_id, data_pomiaru, wynik) VALUES (null, $przedzial, '$data', $bmi);";

                    $res = mysqli_query($con, $query);

                    mysqli_close($con);

                }

            ?>

        </section>
        <section id="prawy">

            <img src="./rys1.png" alt="ćwiczenia">

        </section>

        <footer>

            Autor: 00000000000 (Mateusz#4711) <a href="./kwerendy.txt"> Zobacz kwerendy </a>

        </footer>
        
    </body>

</html>