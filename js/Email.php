<?php

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message']))
{
$text = $_POST['message'];
$text = str_ireplace("\r\n", "<br>", $text); 
	

$message=
'<b>Full Name: </b><br>	'.$_POST['name'].'<br /><br>
<b>Email:	</b><br> '.$_POST['email'].'<br /><br>
<b>Comments: </b><br> '.$text.'
';

    require "phpmailer/class.phpmailer.php"; //include phpmailer class
      
    // Instantiate Class  
    $mail = new PHPMailer();  
      
    // Set up SMTP  
   $mail->IsSMTP();                // Sets up a SMTP connection  
    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization    
    $mail->SMTPSecure = "SSL";      // Connect using a TLS connection  
    $mail->Host = "gpca.co.in.cp-32.bigrock.in";  // SMTP server address
    $mail->Port = 25;  // SMTP port
    $mail->Encoding = '7bit';
    
    // Authentication  
    $mail->Username   = "contact@gpca.co.in"; 
    $mail->Password   = "Gpca@123!"; // 
      
    // Compose
    $mail->SetFrom("contact@gpca.co.in", "Notification");
    $mail->Subject = "Contact Form Enquiry";      // Subject (which isn't required)  
    $mail->MsgHTML($message);
 
    // Send To  
    $mail->AddAddress("contact@gpca.co.in"); // Where to send it - Recipient
    $result = $mail->Send();		// Send!  
	
	
	
	echo 'Message has been sent successfully';
	
}	
else
{
echo 'Fill in all required fields!';
}

?>