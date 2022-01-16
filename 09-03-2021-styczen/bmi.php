<!DOCTYPE html>
<html lang="pl">

    <head>

        <meta charset="UTF-8">
        <title> Twoje BMI </title>
        <link rel="stylesheet" href="./styl3.css">

    </head>

    <body>
        
        <div id="logo">

            <img src="./wzor.png" alt="wzór BMI">

        </div>

        <div id="baner">
            <h1> Oblicz swoje BMI </h1>
        </div>

        <div id="main">

            <table>

                <tr>
                    <td> Interpretacja BMI </td>
                    <td> Wartość minimalna </td>
                    <td> Wartość maksymalna </td>
                </tr>

                <?php
                
                    $conn = mysqli_connect('localhost', 'root', '', 'ee09_03_2021');

                    $zapytanie1 = 'SELECT informacja, wart_min, wart_max FROM bmi;';

                    $query = mysqli_query($conn, $zapytanie1);

                    while($linia = mysqli_fetch_row($query)) {

                        echo "<tr>";

                            foreach($linia as $element) {
                                echo "<td> $element </td>";
                            }

                        echo "</tr>";

                    }
                    
                    mysqli_close($conn);
                
                ?>
                
            </table>

        </div>
        
        <div id="lewy">
        
            <h2> Podaj wagę i wzrost </h2>
            <form method="POST" action="">

                Waga: <input type="number" name="waga"> <br>
                Wzrost w cm: <input type="number" name="wzrost"> <br>
                <input type="submit" value="Oblicz i zapamiętaj wynik.">

            </form>

            <?php
            
                $conn = mysqli_connect('localhost', 'root', '', 'ee09_03_2021');

                    if ($_POST && ($_POST['waga'] || $_POST['wzrost'])) {

                        $waga = $_POST['waga'];
                        $wzrost = $_POST['wzrost'];
                        
                        $bmi = $waga/($wzrost * $wzrost);

                        $bmi = $bmi * 10000;
                        
                        echo "Twoja waga: $waga ";
                        echo " Twój wzrost: $wzrost";
                        echo "<br>BMI wynosi: $bmi";

                        $bmi_id = 0;

                        if ($bmi >= 0 && $bmi <= 18) {
                            $bmi_id = 1;
                        } else if ($bmi >= 19 && $bmi <= 25) {
                            $bmi_id = 2;
                        } else if ($bmi >= 26 && $bmi <= 30) {
                            $bmi_id = 3;
                        } else if ($bmi >= 31 && $bmi <= 100) {
                            $bmi_id = 4;
                        }

                        $data_pomiaru = date('Y-m-d');

                        $zapytanie2 = "INSERT INTO wynik (bmi_id, data_pomiaru, wynik) VALUES ($bmi_id, $data_pomiaru, $bmi);";

                        mysqli_query($conn, $zapytanie2);

                    }

                mysqli_close($conn);
            
            ?>

        </div>

        <div id="prawy">
            <img src="./rys1.png" alt="ćwiczenia">
        </div>

        <div id="stopka">
            Autor: 00000000000 <a href="./kwerendy.txt"> Zobacz kwerendy </a>
        </div>

    </body>

</html>