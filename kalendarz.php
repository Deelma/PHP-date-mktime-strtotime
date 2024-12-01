<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <style>

        table{
            border: solid black 1px;
            border-collapse: collapse;
            padding: 15px;
            text-align: center;
        }

        th{
            width: 100px;
            background-color: purple;
            color: white;
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
    echo "<table border='1'><tr>";
    
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