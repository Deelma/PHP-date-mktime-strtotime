[Friday 12:13] Nikodem Warmowski
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatki</title>
    <style>
        
        table{
            border: solid black 1px;
            font-style: italic;
            border-collapse: collapse;
        }

        th{
            background-color: purple;
            color: white;
            width: 40px;
        }

        td:hover{
            background-color: purple;
        }

    </style>
</head>
<body>
    <form method="POST">
        <input type="number" placeholder="dzien" min="0" max="31" name="1">
        <input type="number" placeholder="miesiąc" min="0" max="12" name="2">
        <input type="number" placeholder="rok" min="0" max="9999" name="3">
    <br>
        <input type="number" placeholder="godzina" min="0" max="24" name="4">
        <input type="number" placeholder="minuta" min="0" max="60" name="5">
        <input type="number" placeholder="sekunda" min="0" max="60" name="6">
    <br>
    <input type="submit">
    <br><br>
    </form>
   
</body>
</html>
 
<?php
 
//zad 1
 
if(isset($_POST['1']) && isset($_POST['2']) && isset($_POST['3']) && isset($_POST['4']) && isset($_POST['5']) && isset($_POST['6'])){
 
   
        $date = date("d-m-Y", mktime(0, 0, 0, $_POST['1'], $_POST['2'], $_POST['3']));
        $time = date("H:i:s", mktime($_POST['4'], $_POST['5'], $_POST['6']));
   
        echo "Wpisana data to: " . $date . "<br>";
        echo "a czas to: " . $time;
   
 
//zad 2
 
    echo "<br><br>Dzien tygodnia to " . date("l",  mktime(0, 0, 0, $_POST['1'], $_POST['2'], $_POST['3'])) . "<br><br>";
 
}

//zad 3
 
date_default_timezone_set('Europe/Warsaw');

function tabela_aktualny_tydzien(){

    $dniTygodnia = ['Pon', 'Wto', 'Śro', 'Czw', 'Pią', 'Sob', 'Nie'];
    
    $dzientyg = date('N');
 
    echo "<table border='1'>";
    echo "<tr>";

    foreach($dniTygodnia as $day){
        echo "<th> $day </th>"; 
    }

    echo "</tr>";
}
 
tabela_aktualny_tydzien();
  




?>