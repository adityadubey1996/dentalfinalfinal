<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
if(isset($_POST['submit'])){
    $name = $_POST['name']
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $qualificataion = $_POST['Qualification'];
    $id = $_POST['id'];
    $result= ""
    echo ".$name"
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

    $mail->Host='smtp.gmail.com'
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecur='tls';
    $mail->Username='aditya.tedroox@gmail.com';
    $mail->Password='tedroox123';

    $mail->setFrom($email,$name);
    $mail->addAddress('aparna.tedroox@gmail.com');
    $mail->addReplyTo($email,$name);

    $mail->isHTML(true);
    $mail->Subject='Form Submission: '.$id;
    $mail->body='Name: '.$name.'email: '.$email;

    $mail->send();
    $result = '<div class="alert alert-danger" role="alert">message delivered</div>'
    catch(Exception $e){
    $result = '<div class="alert alert-danger" role="alert">message could not be <seen>{'.$mail->ErroInfo.'}</div>'

    }
    ?>
