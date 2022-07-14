<?php

require("/home/customer/www/bitcap.com/public_html/scrapper/vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("/home/customer/www/bitcap.com/public_html/scrapper/vendor/phpmailer/phpmailer/src/SMTP.php");
require("/home/customer/www/bitcap.com/public_html/scrapper/vendor/phpmailer/phpmailer/src/Exception.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader
//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP(); // enable SMTP

//Server settings
$mail->SMTPDebug = 1;                  
$mail->isSMTP();                         
$mail->Host       = '***'; 
$mail->SMTPAuth   = true;           
$mail->Username   = '***';                     
$mail->Password   = '***';                              
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;                                    

//Recipients
$mail->setFrom('****', 'Scrapper Bot');
$mail->addAddress('milija.jovicic@gmail.com');
$mail->addAddress('****');

//Attachments

//Content
/*$mail->isHTML(true);
$mail->Subject = 'New PDF on Hansa Invest';
$mail->Body    = 'Hi,There is new link on Hansainvest.com';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';*/