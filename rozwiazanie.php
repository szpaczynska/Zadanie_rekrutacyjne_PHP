<?php
//ZADANIE REKRUTACYJNE
//przypisanie danych z pliku csv do tablicy
$csvArray = array_map('str_getcsv', file('php_internship_data.csv'));

//pobranie do tablicy wyłącznie imion
for($i=0; $i<100000;$i++)
{
    $array[] = $csvArray[$i][0];

}

//zliczenie ilości występowania imion w tablicy
$arr_count=array_count_values($array);

//stworzenie tablicy zawierającej wyłącznie wartości
$val = array_values($arr_count);

//zadeklarowanie tablicy służącej do wykluczania najwyższych wyników
$top_list = array();

//dopóki tablica nie ma 10 elementów szukamy największego wyniku niewystępującego w tablicy i zapisujemy go do tablicy
while(count($top_list)<10){
$max=0;
for($i=0;$i<count($val);$i++)
{
    if(!in_array($val[$i],$top_list))
    {
        if($val[$i]>$max)
        {
            $max = $val[$i];
        }   
    }
}
$top_list[] = $max; 
}

//Tworzymy tablicę finalną do wyświeltenia wyników, tak aby klucz zaczynał się od wielkiej litery, a waratością była ilość występowania
for($i = 0; $i<count($top_list); $i++)
{
   $final[ucfirst(strtolower(array_search($top_list[$i],$arr_count)))] = $top_list[$i] ;
}


//wyświetlamy tablicę finalną 
echo "ROZWIĄZANIE: ";
echo '<pre>';
print_r($final);
echo '</pre>';

//-----------------------------------------------------------------------------------------------------------------------------------------
//ZADANIE DODATKOWE

//pobranie do tablicy wyłącznie dat
for($i=0; $i<100000;$i++)
{
    $array_all_dates[] = $csvArray[$i][1];
}


//Stowrzenie tablicy dat urodzenia dla osób urodzonych od 1 stycznia 2000
$date = '2000-01-01';
for($i=0; $i<100000;$i++)
{
    if($array_all_dates[$i]>=$date)
    {
        $array_dates[] = $array_all_dates[$i];
    }
}

//zliczenie ilości występowania dat w tablicy
$arr_dates_count=array_count_values($array_dates);

//stworzenie tablicy zawierającej wyłącznie wartości
$val_dates = array_values($arr_dates_count);

//zadeklarowanie tablicy służącej do wykluczania najwyższych wyników
$top_list_dates = array();

//dopóki tablica nie ma 10 elementów szukamy największego wyniku niewystępującego w tablicy i zapisujemy go do tablicy
while(count($top_list_dates)<10){
    $max=0;
    for($i=0;$i<count($val_dates);$i++)
    {
        if(!in_array($val_dates[$i],$top_list_dates))
        {
            if($val_dates[$i]>$max)
            {
                $max = $val_dates[$i];
            }   
        }
    }
    $top_list_dates[] = $max; 
   }

//Tablica 10 najczęstszych dat z ilością występowania
for($i = 0; $i<count($top_list_dates); $i++)
{
   $final_dates[(array_search($top_list_dates[$i],$arr_dates_count))] = $top_list_dates[$i] ;  
}

//Zmiana formatu daty
$keys = array_keys($final_dates);
for($i = 0; $i<count($keys); $i++)
{
$orgDate = ($keys[$i]);  
$newDate = date("d-m-Y", strtotime($orgDate));
$date = str_replace('-', '.', $newDate);   
$keys[$i]= $date;
}

$final_dates= array();

//Przypisanie nowego formatu daty to ilości występowania
for($i = 0; $i<count($top_list_dates); $i++)
{
   $final_dates[$keys[$i]] = $top_list_dates[$i] ;  
}


//Wyświetlenie wyniku 
print_r("ZADANIE DODATKOWE: ");
echo '<pre>';
print_r($final_dates);
echo '</pre>';

?>
