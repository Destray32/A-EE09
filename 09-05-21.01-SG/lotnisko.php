<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div class="baner">
        <div class="b1"><img src="zad5.png" alt="logo lotnisko" srcset=""></div>
        <div class="b2"><h1>Przyloty</h1></div>
        <div class="b3">
            <h3>przydatne linki</h3>
            <a target="_blank" href="kwerendy.txt">Pobierz...</a>
        </div>
    </div>

    <div style="clear: both;"></div>

    <div class="blok-glowny">
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php
                 $polaczenie = mysqli_connect("localhost", "root", "", "egzamin");
                 $zapytanie = mysqli_query($polaczenie, "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;");

                while ($wynik = mysqli_fetch_array($zapytanie)) {
                    echo "<tr><td>".$wynik["czas"]."</td><td>".$wynik["kierunek"]."</td><td>".$wynik["nr_rejsu"]."</td><td>".$wynik["status_lotu"]."</td></tr>";
                }
                mysqli_close($polaczenie);    
            ?>
        </table>
    </div>

    <footer>
        <div>
            <div class="stopka1">
                <?php
                    if (!isset($_COOKIE["ciastko"]))
                    {
                        setcookie("ciastko", "ciastko", time()+7200);
                        echo "<p><i>Dzien dobry! Strona lotniska używa ciasteczek</i></p>";
                    }
                    else if(isset($_COOKIE["ciastko"]))
                    echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
                ?>
            </div>
            <div class="stopka2">
                Autor: 00000000000
            </div>
        </div>
    </footer>
    <div style="clear: both;"></div>
</body>
</html>