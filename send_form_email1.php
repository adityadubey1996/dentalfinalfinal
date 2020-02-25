<?php


$email_to = "dentalconnectacad@gmail.com";
$email_to1 = 'aparna.tedroox@gmail.com';
$email_subject = "form Details";
$email_subject1 = 'dental connect';
$password='Salil@1507';
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail1 = new PHPMailer;
function died($error) {
    // your error code can go here
    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
    echo "These errors appear below.<br /><br />";
    echo $error."<br /><br />";
    echo "Please go back and fix these errors.<br /><br />";
    die();
}


if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone_number']) ||
        !isset($_POST['Qualification']) ||
        !isset($_POST['City'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }

else { 
    $name = $_POST['name']; // required
    $Qualification = $_POST['Qualification']; // required
    $email_from = $_POST['email']; // required
    $phone_number = $_POST['phone_number']; // not required
    $City = $_POST['City']; // required
    $course_name = $_POST['course_name'];
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$Qualification)) {
    $error_message .= 'The Qualification you entered does not appear to be valid.<br />';
  }
 
  if(strlen($City) < 2) {
    $error_message .= 'The City you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    
    $email_message = "Form details below.\n\n";
    $email_message1 = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
    $email_message .= "thanks for contacting us we will get back to you within 24 hours on ".clean_string($phone_number)."\n";
    $email_message .= "Below are the fields which you entered";
    $email_message .= "<br> First Name: ".clean_string($name)."\n";
    $email_message .= "<br> Last Name: ".clean_string($Qualification)."\n";
    $email_message .= " <br> Email: ".clean_string($email_from)."\n";
    $email_message .= "<br> phone_number: ".clean_string($phone_number)."\n";
    $email_message .= "<br> City: ".clean_string($City)."\n";
    $email_message .= "<br> Course name".clean_string($course_name)."\n";



   
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $email_to;
$mail->Password = $password;
$mail->addAddress($email_from,'dentalconnectacademy');

$mail->Subject = $email_subject;
$mail->msgHTML($email_message);



// $mail1->isSMTP();
$mail1->Host = 'smtp.gmail.com';
$mail1->Port = 587;
$mail1->SMTPSecure = 'tls';
$mail1->SMTPAuth = true;
$mail1->Username = 
$mail1->setFrom($email_to1);
$mail1->addAddress($email_to1);

$mail1->Subject = $email_subject1;
$mail1->msgHTML($email_message1);
if (!$mail->send()) {
    $error = "Mailer Error: " . $mail->ErrorInfo;
    echo '<p id="para">'.$error.'</p>';
    }
    else {
    echo '<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </head>

    <body>
<div class="jumbotron text-center">
    <h1 class="display-3">Thank You!</h1>
    <p class="lead"><strong>Please check your email</strong>for form details.</p>
    <hr>
    <p>
      Having trouble?<p>kindly try again</p>
    </p>
    <p class="lead">
      <a class="btn btn-primary btn-sm" href="index.html" role="button">Continue to homepage</a>
    </p>
  </div>
</body>
  </html>';
    }
    }
    
    
    

?>


