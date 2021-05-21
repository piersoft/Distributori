<?php

$url="https://www.mise.gov.it/images/exportCSV/anagrafica_impianti_attivi.csv";
if (($file_handle = fopen($url, "r")) !== false) {


$example='';
     $row = 0;

     while (($data = fgetcsv($file_handle, 1024, ";")) !== false) {
         $row++;
         if ($row < 2) continue; // *** skip rows without '34' ***

         foreach ($data as $key => &$value) {
           if ($data[8] !='' && $data[9] !=''){
           $value=str_replace(",",".",$value);

           $value=str_replace(";",",",$value);
           $value=str_replace("Latitudine","Lat",$value);
           $value=str_replace("Longitudine","Lon",$value);

          //   echo utf8_encode($value);

          //   echo utf8_encode($value);
          //   echo utf8_encode($value);

          $example.=$value.",";
          }
         }
         $example.="\n";


     }
     fclose($file_handle);
    // echo $str;

  echo utf8_encode($example);

}


 ?>
