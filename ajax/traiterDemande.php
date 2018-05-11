<?php

//Importation de la class phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//chargement de l'autochargement de composer
require '../vendor/autoload.php';

//Valeur du status par défaut
$status = false;

$mail = new PHPMailer;

//Gestion des erreur, en paramètre le status de type boolèen et le message d'erreur
//Puis retour au format json vers fonction ajax d'appel
function retourVersAjax($status,$msgErreur){
    echo json_encode (array("status" => $status,"message" => $msgErreur));
    
}

//
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(empty($_POST['nom'])){
        $messageRetour = "Veuillez saisir un nom!";
        retourVersAjax($status,$messageRetour);
        exit();
    }else{
        $nom = test_input($_POST['nom']);
        //vérification de la conformité du nom, espace et lettre uniquement
        if (!preg_match("/^[a-zA-Z ]*$/",$nom)) {
            $msg = "Veuillez saisir un nom correcte!";
            retourVersAjax($status,$msg);
            exit();
        }
    }
    
    if(empty($_POST['prenom'])){
        $messageRetour = "Veuillez saisir un prénom!";
        retourVersAjax($status,$messageRetour);
        exit();
    }else{
        $prenom = test_input($_POST['prenom']);
        //vérification de la conformité du prénom, espace et lettre uniquement
        if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {
            $msg = "Veuillez saisir un prénom correcte!";
            retourVersAjax($status,$msg);
            exit();
        }
    }
    
    if(empty($_POST['email'])){
        $messageRetour = "Veuillez saisir une adresse email!";
        retourVersAjax($status,$messageRetour);
        exit();
    }else{
        $email = test_input($_POST['email']);
        //vérification de la conformité de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "Veuillez saisir une adresse email correcte!";
            retourVersAjax($status,$msg);
            exit();
        }
    }
    
    if(empty($_POST['tel'])){
        $messageRetour = "Veuillez saisir un numéro de téléphone!";
        retourVersAjax($status,$messageRetour);
        exit();
    }else{
        $tel = test_input($_POST['tel']);
    }
    
    if(empty($_POST['heure'])){
        $messageRetour = "Veuillez sélectionner une tranche horaire";
        retourVersAjax($status,$messageRetour);
        exit();
    }else{
        $heure = test_input($_POST['heure']);
    }
     
    if(empty($_POST['commune'])){
        $messageRetour = "Veuillez choisir votre commune";
        retourVersAjax($status,$messageRetour);
        exit();
    }else{
        $commune = test_input($_POST['commune']);
    }
    
    if(count($_POST['service']) <= 1){
        $messageRetour = "Veuillez choisir au moins un service";
        retourVersAjax($status,$messageRetour);
        exit();
    }else{
        $serviceTab = $_POST['service'];
        $service = implode(" ",array_unique($serviceTab));
    }
    
    if(empty($_POST['typeProjet'])){
        $messageRetour = "Veuillez sélectionner votre type de projet";
        retourVersAjax($status,$messageRetour);
        exit();
    }else{
        $typeProjet = test_input($_POST['typeProjet']);
    }
    
    if(empty($_POST['delai'])){
        $delai = "";
    }else{
        $delai = test_input($_POST['delai']);
    }
    
    if(empty($_POST['autreChose'])){
        $autreChose = "";
    }else{
        $autreChose = test_input($_POST['autreChose']);
    }
    
    if(empty($_FILES['photos'])){
        
    }else{
        //dossier contenant les images temporairement stockées
        $target_dir = "tmp/";
      
        for($i = 0; $i < count($_FILES['photos']['name']);$i++){
            
        $target_file = $target_dir . basename($_FILES["photos"]["name"][$i]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        //vérifie si le fichier est bien une image
        $check = getimagesize($_FILES['photos']['tmp_name'][$i]);
        if($check !== false ){
            $messageRetour = "Veuillez sélectionner une image au format jpeg, jpg, png";
            retourVersAjax($status,$messageRetour);
            exit();
        }
        
        // vérifier la taille du fichier
        if ($_FILES["photos"]["size"][$i] > 500000) {
            $messageRetour = "Veuillez sélectionner une image avec une taille plus petite";
            retourVersAjax($status,$messageRetour);
            exit();        
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $messageRetour = "Veuillez sélectionner une image au format jpeg, jpg, png";
            retourVersAjax($status,$messageRetour);
            exit();            
        }
        
        move_uploaded_file($_FILES['photos']['tmp_name'][$i], $target_file);
        }
    }
    //on change le status pour le retour a l'ajax
    $status = true;
}

    //Contrôle des saisie utilisateurs
    function test_input($data){
        //Retire les espaces au début et a la fin
        $data = trim($data);
        //Retire les guillemet de la chaine de caractère
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }

        //Option serveur
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.orange.fr';
        $mail->Port = 25;
        
        //Contenu
        $mail->Form = $email;;
        $mail->addAddress('xtoty971@gmail.com');    //destinataire
        $mail->addReplyTo($email);                  //email à qui répondre
        
        var_dump($_FILES['photos']);
        //Pièce jointe
        for($i = 0; $i < count($_FILES['photos']['name']);$i++){
            $nomFichier = $_FILES['photos']['name'][$i];
            $fichier   = fopen("../tmp/".$nomFichier, "r");
            
            $attachement = fread($fichier, filesize($nomFichier));
            
            $attachement = chunk_split(base64_encode($attachement));
            $mail->addAttachment($attachement);
            fclose($fichier);
        }
        
        //mail format texte
        $retourneLigne = "\n";
        $mail_txt = "Bonjour une nouvelle demande de devis a été saisie sur le site.".$retourneLigne;
        $mail_txt .= "M ou Mme ".$nom.$prenom.$retourneLigne;
        $mail_txt .= "Téléphone : ".$tel.$retourneLigne;
        $mail_txt .= "Email : ".$email.$retourneLigne;
        $mail_txt .= "Horaire d'appel disponible : ".$heure.$retourneLigne;
        $mail_txt .= "Commune : ".$commune.$retourneLigne;
        $mail_txt .= "Services : ".$service.$retourneLigne;
        $mail_txt .= "Type de projet : ".$typeProjet.$retourneLigne;
        $mail_txt .= "Délai : ".$delai.$retourneLigne;
        $mail_txt .= "Autres : ".$autreChose.$retourneLigne;
        
        //mail format html
        $mail_html = "Bonjour une nouvelle demande de devis a été saisie sur le site.<br/>";
        $mail_html .= "M ou Mme ".$nom.$prenom."<br/>";
        $mail_html .= "Téléphone : ".$tel."<br/>";
        $mail_html .= "Email : ".$email."<br/>";
        $mail_html .= "Horaire d'appel disponible : ".$heure."<br/>";
        $mail_html .= "Commune : ".$commune."<br/>";
        $mail_html .= "Services : ".$service."<br/>";
        $mail_html .= "Type de projet : ".$typeProjet."<br/>";
        $mail_html .= "Délai : ".$delai."<br/>";
        $mail_html .= "Autres : ".$autreChose."<br/>";
        
        
        //Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = 'Demande de devis : '.$nom.' '.$prenom;
        $mail->Body = $mail_html;
        $mail->AltBody = $mail_txt;
     
        //Envoie du mail si il n'y as pas d'erreur
        if($status){
            $mail->send();
            $messageRetour = "Votre demande a été reçu par notre système. Nous vous contacterons bientôt, Merci de votre visiste !";
            retourVersAjax($status, $messageRetour);
            exit();
        }else{
            $messageRetour = "Erreur d'envoie de votre demande, réssayez s'il vous plait.";
            retourVersAjax($status, $messageRetour);
            exit();
        }
    
?>