<?php
$filename = 'upload/template_mahasiswa.csv';

if(file_exists($filename)){
	
	$the_big_array = []; 

	if (($h = fopen("{$filename}", "r")) !== FALSE) 
	{
	  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
	  {
		  $the_big_array[] = $data;		
	  }
	  fclose($h);
	}
} else {
	$the_big_array = [];
}
//print_r($the_big_array);
?>
