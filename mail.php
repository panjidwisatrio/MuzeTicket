<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient,$subject,$message)
{

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 465;
  $mail->Host       = "ssl://smtp.gmail.com";
  $mail->Username   = "panjisatrio888@gmail.com";
  $mail->Password   = "ghivccgiwdcgpqom";

  $mail->IsHTML(true);
  $mail->AddAddress($recipient, "Customer");
  $mail->SetFrom("panjisatrio888@gmail.com", "MuzeTicket");
  $mail->Subject = $subject;
  $content = $message;

  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    // echo "Error while sending Email.";
    // echo "<pre>";
    // var_dump($mail);
    return false;
  } else {
    // echo "Email sent successfully";
    return true;
  }

}

?>