<?php
  require_once 'mailer/class.phpmailer.php'; 
  // creates object
  $mail = new PHPMailer(true); 
  if(isset($_POST['submit']))
  {
   $name      = strip_tags($_POST['name']);
   $email      = strip_tags($_POST['mail']);
   $subject    = strip_tags($_POST['subject']);
   $text_message    = "Hello";      
   $message  = strip_tags($_POST['message']);
 try
   {
    $mail->IsSMTP(); 
    $mail->isHTML(true);
    $mail->SMTPDebug  = 0;                     
    $mail->SMTPAuth   = true;                  
    $mail->SMTPSecure = "ssl";                 
    $mail->Host       = "smtp.gmail.com";      
    $mail->Port        = '465';             
    $mail->AddAddress($email);
    $mail->Username   ="fintechgie@gmail.com";  //Your Mail
    $mail->Password   ="kiyas@234";     //Your Password     
    $mail->SetFrom("fintechgie@gmail.com",'From User'); //Your Name , Your Mail
    $mail->AddReplyTo($email,$name); //Contact form User Name
    $mail->Subject    = $subject;
    $mail->Body    = $message;
    $mail->AltBody    = $message;
     
    if($mail->Send())
    {
     $msg = "Hi, Your mail successfully sent to".$email." ";
    }
   }
   catch(phpmailerException $ex)
   {
    $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
   }
  } 
  
?>