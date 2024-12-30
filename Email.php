<?php

try {
	
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message']))
    {
    $text = $_POST['message'];
    $text = str_ireplace("\r\n", "<br>", $text); 
    	
    
    $message=
    '<b>Full Name: </b><br>	'.$_POST['name'].'<br /><br>
    <b>Email:	</b><br> '.$_POST['email'].'<br /><br>
    <b>Comments: </b><br> '.$text.'
    ';
        try
        {
            require("/home3/excelai6/public_html/phpmailer/class.phpmailer.php");
            require("/home3/excelai6/public_html/phpmailer1/Exception.php");
             
            // Instantiate Class  
            $mail = new PHPMailer(true);  
              
            
            // Set up SMTP  
            //$mail->IsSMTP();                // Sets up a SMTP connection  
            $mail->SMTPAuth = true; 
            $mail->Timeout = 30;
            // Connection with the SMTP does require authorization    
            //$mail->SMTPSecure = "tls";      // Connect using a TLS connection  
            $mail->Host = "mail.excelsiorbird.com";  // SMTP server address
            $mail->Port = 587;  // SMTP port
            //$mail->Encoding = '7bit';
            //$mail->SMTPDebug  = 2;
            
            // Authentication  
            $mail->Username   = "info@excelsiorbird.com"; 
            $mail->Password   = "?p1!8$@2Y8*gYoOw"; 
              
            // Compose
            $mail->isHTML(true);      
            $mail->SetFrom("info@excelsiorbird.com", "info@excelsiorbird.com");
            $mail->Subject = "Contact Form Enquiry";      
            $mail->Body = $message;
            // Send To  
            $mail->AddAddress("info@excelsiorbird.com"); //Recipient
           
            $mail->Send();
            echo "Message has been sent successfully.";

        }
        catch (phpmailerException $e) {
            echo "Message could not be sent. $e->getMessage()";
        }
    }
    else
    {
    echo "Fill in all required fields!";
    }
}
Catch(phpmailerException $e) {
  echo 'Message: ' .$e->getMessage();
  //echo 'Ops! We are unable to send message at the moment.';
}
	

?>