<?php
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$sujet = $_POST["sujet"];
$message = $_POST["message"];

//as-plus@orange.fr
$EmailTo = "emailaddress@test.com";

// corps de l'email
$Body .= "Nom: ".$nom." Prénom: ".$prenom. "\n";

$Body .= "Email: ".$email." Téléphone: ".$tel."\n";

$Body .= "Sujet: [Contact]".$sujet."\n";

$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";
 
// fonction mail pour l'envoi
$success = mail($EmailTo, $sujet, $Body, "From:".$email);
 
// renvoie si l'email à été envoyé ou pas
if ($success){
   echo "success";
}else{
    echo "invalid";
}
 
?>