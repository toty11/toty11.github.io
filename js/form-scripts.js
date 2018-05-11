$("#contactForm").submit(function(event){
    // stop l'envoi du formulaire qui aurait rafraîchi la page
    event.preventDefault();
    submitForm();
});

function submitForm(){
    // Initialisation des variables
    var nom = $("#nom").val();
	var prenom = $("#prenom").val();
    var email = $("#email").val();
	var tel = $("#tel").val();
	var sujet = $("#sujet").val();
    var message = $("#message").val();
 
    $.ajax({
        type: "POST",
        url: "ajax/traiterContact.php",
        data: "nom=" + nom + "&prenom=" + prenom + "&email=" + email + "&tel" + tel + "&sujet" + sujet + "&message=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
            }
        }
    });
}
function formSuccess(){
    $( "#msg" ).removeClass( "hidden" );
}