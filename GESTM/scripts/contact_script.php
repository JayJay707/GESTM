<?php

$errors = '';
$myemail = 'juliette.mesnil35@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['phone']) || 
   empty($_POST['message']))
{
    $errors .= "\n Erreur : tous les champs sont requis";
}

$name = $_POST['name']; 
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Erreur : Adresse mail invalide";
}

if(!preg_match('/^[0-9]{10}+$/', $phone)) {
    $errors .= "\n Erreur : Numéro de téléphone invalide";
}

if( empty($errors)) {

    $to = $myemail;

    $email_subject = "Contact : $name";

    $email_body = "Vous avez reçu un nouveau message. ".

    " Voici les détails :\n Nom : $name \n ".

    "Email: $email_address\n Téléphone : $phone Message \n $message";

    $headers = "From: $myemail\n";

    $headers .= "Reply-To: $email_address";

    mail($to,$email_subject,$email_body,$headers);

    //redirect to the 'thank you' page
    header('Location: contact_form_thank_you.html');

}

?>