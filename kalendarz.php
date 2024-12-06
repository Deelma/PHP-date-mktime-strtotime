<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <style>

        table{
            border: solid black 3px;
            border-collapse: collapse;
            padding: 15px;
            text-align: center;
        }

        th{
            border: solid black 3px;
            width: 100px;
            background-color: purple;
            color: white;
        }

        td{
            border: solid black 2px;
            background-color: #e7d8f0ee;
        }

        td:hover{
            background-color: purple;
            color: white;
        }

        #dzisiaj{
            font-weight: bold;
            background-color: black;
            color: white;
        }

        input, select{
            border: none;
            border-bottom: solid purple 2px;
        }

    </style>
</head>
<body>
    <form action="kalendarz.php" method="post">
        <select name="miesiac">
            <option value="styczen">styczeń</option>
            <option value="luty">luty</option>
            <option value="marzec">marzec</option>
            <option value="kwiecien">kwiecien</option>
            <option value="maj">maj</option>
            <option value="czerwiec">czerwiec</option>
            <option value="lipiec">lipiec</option>
            <option value="sierpien">sierpien</option>
            <option value="wrzesien">wrzesien</option>
            <option value="pazdziernik">pazdziernik</option>
            <option value="listopad">listopad</option>
            <option value="grudzien">grudzien</option>
        </select>
        Rok <input name="rok" type="number" min="0" max="9999">
        <input type="button" value="przeslij">
    </form>
    
</body>
</html>

<?php 

function kalendarz(){
    
    date_default_timezone_set('Europe/Warsaw');
    
    $dzisiaj = date('Y-m-d');
    
    $pierwszydzienmiesiaca = mktime(12, 0, 0, date('n'), 1, date('Y'));

    $pierwszydzientygodnia = date('N', $pierwszydzienmiesiaca); 

    $iloscdniwmiesiacu = date('t', $pierwszydzienmiesiaca);

    $dnitygodnia = ['Poniedzialek', 'Wtorek', 'Sroda', 'Czwartek', 'Piatek', 'Sobota', 'Niedziela'];
    
    echo "<h1>Kalendarz " . date('F') . " " . date('Y') . "</h1>";
    echo "<table><tr>";
    
    foreach($dnitygodnia as $d){
        echo "<th>$d</th>";
    }
    echo "</tr><tr>";

    for($i = 1; $i < $pierwszydzientygodnia; $i++){
        echo "<td></td>";
    }

    for($i = 1; $i <= $iloscdniwmiesiacu; $i++){
        
        $aktualnydzienUnix = mktime(12, 0, 0, date('m'), $i, date('Y'));
        
        $aktualnydzien = date('Y-m-d', $aktualnydzienUnix);

        if($aktualnydzien == $dzisiaj){
            echo "<td id='dzisiaj'>" . $i . "</td>";
        } else {
            echo "<td>" . $i . "</td>";
        }
        
        if((($i + $pierwszydzientygodnia - 1) % 7) == 0){
            echo "</tr><tr>";
        }
    }
    while (($i + $pierwszydzientygodnia - 1) % 7 != 1) { 
        echo "<td></td>"; 
        $i++; 
    }

    echo "</tr></table>";

}

kalendarz();
?>