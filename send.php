<?php

session_start();
require "functions.php";

if(isset($_POST['save_audio']) && $_POST['save_audio'] == "Upload")
{
    $count = 0;
    $dir = 'uploads/';
    $upload_path=$dir.basename($_FILES['audioFile']['name']);
    $filename = basename($_FILES['audioFile']['name']);
    $smtp = $_POST['hostname'];
    $email = $_POST['emailaddress'];
    $password = $_POST['password'];
    $port = $_POST['port'];
    



    if(move_uploaded_file($_FILES['audioFile']['tmp_name'], $upload_path)){
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $from = @$_POST['from'];
        $timer = $_POST['timer'];
        
        $myfile = fopen('uploads/'.$filename,"r") or die("Unable to open file!");
        $contents = file('uploads/'.$filename);
        
        foreach($contents as $line){
            $count++;
            set_time_limit(0);
            sleep($timer);
            sendemail($smtp, $email, $password, $port, $from, $line, $subject, $message);
        }
        fclose($myfile);
    }
}


?>