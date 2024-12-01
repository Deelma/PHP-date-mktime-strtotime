<!-- [Friday 12:13] Nikodem Warmowski -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatki</title>
    <style>
        
        p{
            background-color: #e7d8f0ee;
            font-size: 1vw;
            width: 14vw;
            text-align: center;
            border: groove purple 3px;
        }

        input{
            width: 120px;
            border: none;
            border-bottom: solid purple 3px;
            background-color: #e7d8f0ee;
        }

        table{
            border: solid black 3px;
            font-style: italic;
            border-collapse: collapse;
        }

        th{
            border: solid black 1px;
            background-color: purple;
            color: white;
            width: 40px;
        }

        td{
            border: solid black 1px;
            background-color: #e7d8f0ee;
        }

        td:hover{
            background-color: purple;
        }

        #dzisiaj{
            font-weight: bold;
            background-color: black;
            color: white;
        }

    </style>
</head>
<body>
    <form method="POST">
        <h2>Wybierz dowolną datę</h2>
        <input type="number" placeholder="dzien" min="0" max="31" name="dzien">
        <input type="number" placeholder="miesiąc" min="0" max="12" name="miesiac">
        <input type="number" placeholder="rok" min="0" max="9999" name="rok">
    <br>
        <input type="number" placeholder="godzina" min="0" max="24" name="godzina">
        <input type="number" placeholder="minuta" min="0" max="60" name="minuta">
        <input type="number" placeholder="sekunda" min="0" max="60" name="sekunda">
    <br><br>
    <input type="submit">
    <br><br>
    </form>
   
</body>
</html>
 
<?php
 
//zad 1
 
if(!empty($_POST['dzien']) && !empty($_POST['miesiac']) && !empty($_POST['rok']) && !empty($_POST['godzina']) && !empty($_POST['minuta']) && !empty($_POST['sekunda'])){
 
    $day = intval($_POST['dzien']);
    $month = intval($_POST['miesiac']);
    $year = intval($_POST['rok']);
    $hour = intval($_POST['godzina']);
    $minute = intval($_POST['minuta']);
    $second = intval($_POST['sekunda']);

    $data = date("d-m-Y", mktime(0, 0, 0, $day, $month, $year));
        
    $czas = date("H:i:s", mktime($hour, $minute, $second));
   
    echo "<p>Wpisana data to: " . $data . "<br>";
    echo "a czas to: " . $czas;
   
 
//zad 2
 
    echo "<br><br>Dzien tygodnia to " . date("l",  mktime(0, 0, 0, $month, $day, $year)) . "<br><br></p>";
 
}else{
    echo "<p>Uzupełnij dane.</p>";
}

//zad 3
 
date_default_timezone_set('Europe/Warsaw');

function tabela_aktualny_tydzien(){

    $dniTygodnia = ['Pon', 'Wto', 'Śro', 'Czw', 'Pią', 'Sob', 'Nie'];
    
    echo "<table border='1'>";
    echo "<tr>";

    foreach($dniTygodnia as $day){
        echo "<th> $day </th>"; 
    }

    echo "</tr>";
}
 
function tabela_dni_miesiaca(){

    echo "<tr>";

    $dzisiajUnix = mktime(12, 0, 0);
    
    $dzisiaj = date('Y-m-d', $dzisiajUnix);

    $poniedzialekUnix = mktime(12, 0, 0, date('m'), date('d', $dzisiajUnix) - (date('N', $dzisiajUnix) - 1), date('Y', $dzisiajUnix));

    for($i = 0; $i < 7; $i++){
        $dzienUnix = mktime(12, 0, 0, date('m', $poniedzialekUnix), date('d', $poniedzialekUnix) + $i, date('Y', $poniedzialekUnix));

        $dzien = date('d', $dzienUnix);

        if($dzienUnix == $dzisiajUnix){
            echo "<td id='dzisiaj'>" . $dzien . "</td>";
        }else{
            echo "<td>" . $dzien . "</td>";
        }
        
    }

    echo "</tr>";
    echo "</table>";
}


tabela_aktualny_tydzien();
tabela_dni_miesiaca();
?>