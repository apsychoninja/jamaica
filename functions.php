<?php

require 'vendor/autoload.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function dbconnect($query){
	$conn = mysqli_connect('localhost','root','','jamaica12');
    if(!$conn)
        {
            die('server not connected');
        }

     mysqli_query($conn,$query);
     
     mysqli_close($conn);

}

function savesettings($smtp, $email, $password, $port, $timer){
	    
    $query = "INSERT INTO `Settings`(`id`, `host`, `email`, `password`, `port`, `timer`) VALUES (NULL,'$smtp','$email','$password','$port','$timer')";

    dbconnect($query);

}

function showsmtp(){
	$conn = mysqli_connect('localhost','root','','jamaica12');
    if(!$conn)
    {
        die('server not connected');
    }

    $query = "SELECT `host` FROM `settings` limit 1";
    $r = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($r)){
       echo $row[0];
    }
    mysqli_close($conn);
}

function showemail(){
    
$conn = mysqli_connect('localhost','root', '', 'jamaica12');
    $query = "SELECT `email` FROM `settings` limit 1";
    $r = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($r)){
       echo $row[0];
    }
    mysqli_close($conn);
}

function showpassword(){
$conn = mysqli_connect('localhost','root', '', 'jamaica12');

    $query = "SELECT `password` FROM `settings` limit 1";
    $r = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($r)){
       echo $row[0];
    }
    mysqli_close($conn);
}

function showport(){
    $conn = mysqli_connect('localhost', 'root', '', 'jamaica12');
    $query = "SELECT `port` FROM `settings` limit 1";
    $r = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($r)){
       echo $row[0];
    }
    mysqli_close($conn);
}

/*
 * @param $host = "Host Name"
 * @param $username = "your email address or email from <example@abc.com>"
 * @param $password = "Your smtp account password"
 * @param $recipient = Recipient email address or iterate through file to send multiple emails. 
 * @param $subject = Email subject
 * @param $message = Your Email Message
*/

function sendemail($host, $username, $password, $port, $from, $recipient, $subject, $message)
{


	// Load Composer's autoloader

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
	    $mail->isSMTP();                                            // Send using SMTP
	    $mail->Host       = $host;                    // Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = $username;                     // SMTP username
	    $mail->Password   = $password;                               // SMTP password
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
	    $mail->Port       = $port;                                    // TCP port to connect to

	    
	    $mail->setFrom($from);

	    $mail->addAddress($recipient);               // Name is optional

	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $subject;
	    $mail->Body    = $message;
	    $mail->AltBody = strip_tags($message);

	    $mail->send();
	//    echo 'Message has been sent';
} catch (Exception $e) {
  //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
?>