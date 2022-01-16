<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "dane3");
    ?>
    <!-- baner  -->
    <div>
        <div class="baner-lewy"><h1>Internetowa wypożyczalnia filmów</h1></div>
        <div class="baner-prawy">
            <table>
                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
            </table>
        </div>
    </div>

    <div style="clear: both;"></div>

    <!-- blok listy polecamy -->
    <div class="lista-polecamy">
        <h3>Polecamy</h3>
        
            <!-- skrypt 1 -->
            <?php
                $zapytanie = mysqli_query($polaczenie, "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18,22,23,25);");
                if (!$zapytanie)
                    print("zapytanie nieprawidlowe");
                while ($wynik = mysqli_fetch_array($zapytanie))
                    {
                        echo "<div class='skrypt1'><h4>".$wynik["id"].". ".$wynik["nazwa"]."</h4><img src='".$wynik['zdjecie']."' alt='film'><p>".$wynik['opis']."</p></div>";
                        
                    }
            ?>
        </div>
    </div>

    <!-- blok listy Filmy fantastyczne -->
    <div class="lista-fantastyczne">
        <h3>Filmy fantastyczne</h3>
        <div class="skrypt-2">
            <!-- skrypt 2 -->
            <?php
                $zapytanieDwa = mysqli_query($polaczenie, "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12;");
                if (!$zapytanieDwa)
                    print("zapytanie nieprawidlowe");
                while ($wynik = mysqli_fetch_array($zapytanieDwa))
                    {
                        echo "<div class='skrypt1'><h4>".$wynik["id"].". ".$wynik["nazwa"]."</h4><img src='".$wynik['zdjecie']."' alt='film'><p>".$wynik['opis']."</p></div>";
                        
                    }
            ?>
        </div>
    </div>

    <footer>
        <form action="video.php" method="post">
            Usuń film nr.: <input type="number" name="usuwanie" id="">
            <input type="submit" value="Usuń film">
            <!-- skrypt 3 -->
            <?php
                if(isset($_POST["usuwanie"]))
                {
                    $usuwanie = $_POST["usuwanie"];
                    $zapytanieTrzy = mysqli_query($polaczenie, "DELETE FROM produkty WHERE id = $usuwanie;");
                    if (!$zapytanieTrzy)
                        print("zapytanie 3 blad");
                }
            mysqli_close($polaczenie);
            ?>
        </form>
        Strone wykonał: <a href="mailto:ja@poczta.com">pesel</a>
    </footer>
</body>
</html>