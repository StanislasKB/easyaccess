//var $dis = setInterval(display, 10);
display();
var $dis1 = setInterval(nombreMessage, 100);
var session = false;
$().ready(
    function() {
        $('#message_envoie').on('click', function() {
            var message_text = $("#message_text").val();
            var id_destinataire = $("#id_destinateur").val();
            var id_expediteur = $("#id_expediteur").val();
            if (message_envoie) {
                $.get(
                    "envoie-message.php", { message: message_text, id_e: id_expediteur, id_d: id_destinataire },
                    function(data) {
                        $("#message_text").val("");
                        $('#error').html(data);
                        session = true;
                    }
                );
            } else {
                alert("Veuiller entrer quelques choses");
            }
        });
    }
);

/*
fin envoyer
*/
var verify = false;
var nbr;
var nbrAct;
/*Nouveaux messages messages   */
function nombreMessage() {
    let id_destinataire = $("#id_destinateur").val();
    let id_expediteur = $("#id_expediteur").val();


    $.get(
        "nombre-message.php", { id_e: id_expediteur, id_d: id_destinataire },
        function(data) {
            if (!verify) {
                nbrAct = data;
                verify = true;
            } else {
                nbr = data;
                if (parseInt(nbr) > parseInt(nbrAct)) {
                    display();
                    nbrAct = nbr;
                }
            }
        }
    );
};
/*Afficher les messages   */
function display() {
    let id_destinataire = $("#id_destinateur").val();
    let id_expediteur = $("#id_expediteur").val();

    $.get(
        "display-message.php", { id_e: id_expediteur, id_d: id_destinataire },
        function(data) {
            $('#message_body').html(data);
        }
    );
    let a = document.getElementById("fin_tager");
    a.click();
};


/*Afficher client  */


function display_client() {
    $.get(
        "../../admin/afficher-client.php", { id_e: 'bienvenu' },
        function(data) {
            $('#client_list').html(data);
        }
    );
    let a = document.getElementById("fin_tager");
    a.click();

};
$("#image_label").click(
    function() {
        $("#image_box").removeClass("d-none");
    }
);

$("#image_close").click(
    function() {
        $("#image_box").addClass("d-none");
    }
);


/*Afficher message */
$do = false;
$("#btn_close").click(() => {
    if (!$do) {

        $("#message").removeClass("w-33");
        $("#message").addClass("w-100");
        $("#card_message").addClass("d-none");
        $do = true;
    } else {

        $("#message").addClass("w-33");
        $("#message").removeClass("w-100");
        $("#card_message").removeClass("d-none");
        $do = false;
    }
})
$do1 = false;
$("#btn_messenger_search").click(() => {
        if (!$do1) {

            $("#btn_messenger_search i").css("transform", "rotate(180deg)");
            $("#messagebar").removeClass("d-none");
            $("#messagebar").addClass("d-block");
            $do1 = true;
        } else {
            $("#btn_messenger_search i").css("transform", "rotate(360deg)");
            $("#messagebar").addClass("d-none");
            $("#messagebar").removeClass("d-block");
            $do1 = false;
        }
    })
    /*Notification fonction    */
function disparais() {
    document.getElementById("notification").classList.remove("notification-display")
    document.getElementById("notification").classList.add("notification-none");
}

function display_message(verif) {
    const music = new Audio('/assets/audio/notification.wav');
    music.play();
    if (verif) {
        document.getElementById("notification").classList.remove("bg-danger");
        document.getElementById("notification").classList.add("bg-success");

    } else {
        document.getElementById("notification").classList.remove("bg-success");
        document.getElementById("notification").classList.add("bg-danger");

    }
    document.getElementById("notification").classList.remove("notification-none");
    document.getElementById("notification").classList.add("notification-display");

    var dis = setTimeout(disparais, 5000);

}

$("#message_display_button").click(function() {
    $("#message_display_div").toggleClass("d-none");
});




//users en cours

/*   $("#image_label").click(
  function(){
      
   $("#image_name").html($("#image").val);
   $("#image_box").removeClass("d-none");
  }
);*/