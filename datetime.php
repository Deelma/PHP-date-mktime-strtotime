<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datetime()</title>
    <style>



    </style>
</head>
<body>
    
</body>
</html>

<?php

//! zad 5

echo "Zadanie 5:<br>";

$data1 = date("Y-m-d H:i:s", mktime(12, 10, 34, 12, 24, 2024));
$data2 = date("Y-m-d H:i:s", mktime(12, 0, 0, 12, 24, 2025));
$data3 = date("Y-m-d H:i:s", mktime(12, 0, 14, 04, 21, 2024));
$data4 = date("Y-m-d H:i:s", mktime(12, 12, 11, 12, 01, 2015));

$data1str = date("Y-m-d H:i:s", strtotime('12:10:34 24 December'));
$data2str = date("Y-m-d H:i:s", strtotime('12:00:00 24 December 2025'));
$data3str = date("Y-m-d H:i:s", strtotime('12:00:14 21 April'));
$data4str = date("Y-m-d H:i:s", strtotime('12:12:11 1 December 2015'));

$wybranaUnix = mktime(12, 0, 0, 12, 24, 2025);
$datawybrana = date('Y-m-d H:i:s', $wybranaUnix);

echo $datawybrana == $data1str || $datawybrana == $data2str || $datawybrana == $data3str || $datawybrana == $data4str ? "Wybrana data odpowiada jednej z dat": " Wybrana data nie odpowiada zadnej z dat";

echo "<br><br>";


//! Zad 6 

echo "Zadanie 6: <br>";

$date = date('m/d/Y', mktime(12, 0, 0));

echo $date . " format amerykański" . "<br>";

echo date('Y-m-d', strtotime($date)) . " format polski";

echo "<br><br>";


//! Zad 7

echo "Zadanie 7: <br>";

echo "a) Data 300 dni temu to: " . date('Y-m-d', strtotime('- 300 day')) . ", a za 100 dni to: " . date('Y-m-d', strtotime('+ 100 day')) . "<br>";

echo "b) Data 68 dni przed 31.08.2024 to: " . date('Y-m-d', strtotime("31-08-2024 - 68 day")) . "<br>";

$pierwszyponiedzialek = date('N', strtotime("1-1-2024")) == 1 ?
 strtotime("1-1-2024"): 
 strtotime('1-1-2024 next monday');

echo "c) Data 15 dni po pierwszym poniedziałku to: ";
echo date('Y-m-d', strtotime("+ 15 day", $pierwszyponiedzialek));

echo "<br><br>";


//! Zad 8

echo "Zadanie 8: <br>";

$dzis = date_create('2024-12-02');
$wigilia = date_create('2024-12-24');

$dzisawigilia = $dzis->diff($wigilia);

echo "a) " . $dzisawigilia->d . "<br>";


$sylwester = date_create("01-01-2025");

$dzisasylwester = $dzis->diff($sylwester);

echo "b) " . $dzisasylwester->m * date('t') + $dzisasylwester->d . "<br>";


$ferie = date_create("2-03-2025");
$wakacje = date_create("28-06-2025");

$ferieawakacje = $ferie->diff($wakacje);

echo "c) " . $ferieawakacje->m * date('t') + $ferieawakacje->d . "<br>";

echo "<br>";

//! Zad8.1

$poczateklekcji = new DateTime("8:00:00");
$konieclekcji = new Datetime("15:40:00");

$poczateklekcjiakonieclekcji = $poczateklekcji->diff($konieclekcji);

echo "a) " . ($poczateklekcjiakonieclekcji->h * 60) + $poczateklekcjiakonieclekcji->i . "<br>";


$poczatekmeczu = new DateTime("20:45:00");
$koniecmeczu = new Datetime("22:37:00");

$poczatekmeczuakoniecmeczu = $poczatekmeczu->diff($koniecmeczu);

echo "b) " . ($poczatekmeczuakoniecmeczu->h * 60) + $poczatekmeczuakoniecmeczu->i . "<br>";

?>