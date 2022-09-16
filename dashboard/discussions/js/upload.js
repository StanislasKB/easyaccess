function uploadEnd(imageAdresse) {
    var message_text = imageAdresse;
    var id_destinataire = $("#id_destinateur").val();
    var id_expediteur = $("#id_expediteur").val();
    if (message_envoie) {

        $.get(
            "../../admin/insert-image-message.php", { message: message_text, id_e: id_expediteur, id_d: id_destinataire },
            function(data) {
                $("#image_box").addClass("d-none");
                $('#error').html(data);
                display();
                session = true;
            }
        );
    } else {
        alert("Veuiller entrer quelques choses");
    }
}