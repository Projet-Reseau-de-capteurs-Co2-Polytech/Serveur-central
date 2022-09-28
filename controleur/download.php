<?php
include('bdd.php');
include('../model/co2.php');
if(!empty($_GET["idCapteur"])){
    $capteur = $_GET["idCapteur"];
    $enreg = getCo2Array($capteur);


    $delimiter = ";"; 
    $filename = "capteur.csv"; 
	$fullname ="../resources/$filename";


    $f = fopen($fullname,'w'); 
        

    $fields = array('idCo2', 'Date', 'TauxCO2', 'NomCapteur'); 
    fputcsv($f, $fields, $delimiter); 
        

    foreach ($enreg as $row) { 
        $lineData = array($row['idCo2'], (string)$row['Date'], $row['TauxCO2'], $row['NomCapteur']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
        

    fseek($f, 0); 
        
    
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
	header('Content-Length: ' . filesize($fullname));
	readfile($fullname);

}
exit; 

 ?>