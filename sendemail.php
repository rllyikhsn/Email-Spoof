<?php
require('csv.php');

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Your name <info@address.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

/*
for ($x = 1; $x <  sizeof($the_big_array); $x++){
	$email = $the_big_array[$x][3];
	$message = $the_big_array[$x][2];
	echo '<br>';
	
}
*/
$hostname = '{imap.gmail.com:143/imap/ssl/novalidate-cert}'; 
$username = 'formpengisiancsf@gmail.com'; $password = 'Csfjuni2019'; 
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

print_r(imap_errors());

?>
