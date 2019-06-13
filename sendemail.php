<?php
require('csv.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/*

*/

require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'formpengisiancsf@gmail.com';                     // SMTP username
    $mail->Password   = 'Csfjuni2019';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('datakhusus40@gmail.com', 'CS Finance');
	for ($x = 1; $x <  sizeof($the_big_array); $x++){
		$email = $the_big_array[$x][3];
		$mail->addAddress($email,$the_big_array[$x][1]);
		$mail->Subject = 'Here is the subject';
		$message = $the_big_array[$x][1];
        $mail->Body    = $message;	
        echo $mail->Body;
        echo 'Message has been sent';
        $mail->send();
	}
	
    //$mail->addAddress('xxx@gmail.com', 'Rully Ikhsan');     // Add a recipient
    /*$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
	$mail->addBCC('bcc@example.com');
	*/
    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    //$mail->isHTML(true);                                  // Set email format to HTML
    //$mail->Subject = 'Here is the subject';
    //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    //$mail->send();
    //echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
