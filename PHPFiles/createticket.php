<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$name = $_POST['name'];
$problem = $_POST['problem'];
$timedate = $_POST['timedate'];
$email = $_POST['email'];
$facName = $_POST['requestor'];
$roomNum = $_POST['room'];

require 'dbconfig.php';
if ($name == null || $email == null || $name == '' || $email == '')
{
    echo "Name or email was not supplied";
}
else
{


   foreach ($name as $key => $valname) 
   {
   	
     $sql = "Insert into incidentreport(classRoomID, facultyMember, facEmail, deviceName, Problem, TimeDate, AssignedTech, Status) VALUES('".$roomNum."','".$facName."','".$email."','". $valname."','".$problem[$key]."','".$timedate[$key]."', 0, 'New')";
        if($con->query($sql) === TRUE)
     {
        
         echo "Ticket Created <br>";
     }
     else
     {
         echo "Error: " . $sql . "<br>" . $con->error;
     }
     
    
 	}
     require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";
    require "PHPMailer/src/Exception.php";
   $mail = new PHPMailer();
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $sendEmail;                     //SMTP username
        $mail->Password   = $password;                       //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        foreach($problem as $key => $value)
        {
        //Recipients
        $mail->setFrom($sendEmail, 'SEProj2025 Email Test');
        $mail->addAddress($email, $facName);     //Add a recipient


        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Ticket Created';
        $mail->Body    = 'We have recieved your trouble ticket for ' .$problem[$key].'. An admin member will contact you as soon as possible';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "Message has been sent <br>";
        }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
   
 }
     $con->close();



?>
