var firstname_error = false;

function firstname_field_verification() {
    if ($("#firstname").val() == "") {
        if ($("#firstname").hasClass("valid")) {
            $("#firstname").remove("valid");
        }
        $("#firstname").addClass("invalid ");
        $("#firstname").parent().children("div").remove("div");
        $("#firstname")
            .parent()
            .append(
                '<div class = "invalid-feedback d-block " style="margin-top:-20px">Champs non rempli</div>'
            );
        firstname_error = true;
    } else if ($("#firstname").val().length < 2) {
        if ($("#firstname").hasClass("valid")) {
            $("#firstname").remove("valid");
        }
        $("#firstname").addClass("invalid ");
        $("#firstname").parent().children("div").remove("div");
        $("#firstname")
            .parent()
            .append(
                '<div class = "invalid-feedback d-block " style="margin-top:-20px">Trop court</div>'
            );
        firstname_error = true;
    } else if ($("#firstname").val().length > 25) {
        if ($("#firstname").hasClass("valid")) {
            $("#firstname").remove("valid");
        }
        $("#firstname").addClass("invalid ");
        $("#firstname").parent().children("div").remove("div");
        $("#firstname")
            .parent()
            .append(
                '<div class = "invalid-feedback d-block " style="margin-top:-20px">Trop long</div>'
            );
        firstname_error = true;
    } else {
        if ($("#firstname").hasClass("invalid")) {
            $("#firstname").remove("invalid");
        }
        $("#lastname").remove("invalid");
        $("#firstname").addClass("valid");
        $("#firstname").parent().children("div").remove("div");
        firstname_error = false;
    }
}

var lastname_error = true;

function lastname_field_verification() {
    if ($("#lastname").val() == "") {
        if ($("#lastname").hasClass("valid")) {
            $("#lastname").remove("valid");
        }
        $("#lastname").addClass("invalid ");
        $("#lastname").parent().children("div").remove("div");
        $("#lastname")
            .parent()
            .append(
                '<div class = "invalid-feedback d-block " style="margin-top:-20px">Champs non rempli</div>'
            );
        lastname_error = true;
    } else if ($("#lastname").val().length < 2) {
        if ($("#lastname").hasClass("valid")) {
            $("#lastname").remove("valid");
        }
        $("#lastname").addClass("invalid ");
        $("#lastname").parent().children("div").remove("div");
        $("#lastname")
            .parent()
            .append(
                '<div class = "invalid-feedback d-block " style="margin-top:-20px">Trop court</div>'
            );
        lastname_error = true;
    } else if ($("#lastname").val().length > 25) {
        if ($("#lastname").hasClass("valid")) {
            $("#lastname").remove("valid");
        }
        $("#lastname").addClass("invalid");
        $("#lastname").parent().children("div").remove("div");
        $("#lastname")
            .parent()
            .append(
                '<div class = "invalid-feedback d-block " style="margin-top:-20px">Trop long</div>'
            );
        lastname_error = true;
    } else {
        if ($("#lastname").hasClass("invalid")) {
            $("#lastname").remove("invalid");
        }
        $("#lastname").remove("invalid");
        $("#lastname").addClass("valid");
        $("#lastname").parent().children("div").remove("div");
        lastname_error = false;
    }

    function get_trivia() {
        $.get("ajax/test.html", function(data) {
            $(".result").html(data);
            alert("Load was performed.");
        });
    }
}

var email_error = false;

function email_field_verification() {
    if ($("#email").val() == "") {
        if ($("#email").hasClass("valid")) {
            $("#email").remove("valid");
        }
        $("#email").addClass("invalid ");
        $("#email").parent().children("div").remove("div");
        $("#email")
            .parent()
            .append(
                '<div class = "invalid-feedback d-block " style="margin-top:-20px">Champs non rempli</div>'
            );
        email_error = true;
    } else {
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        if (!regex.test($("#email ").val())) {
            if ($("#email").hasClass("valid")) {
                $("#email").remove("valid");
            }
            $("#email").addClass("invalid ");
            $("#email").parent().children("div").remove("div");
            $("#email")
                .parent()
                .append(
                    '<div class = "invalid-feedback d-block " style="margin-top:-20px">Email invalide</div>'
                );
            email_error = true;
        } else {
            if ($("#email").hasClass("invalid")) {
                $("#email").remove("invalid");
            }
            $("#email").addClass("valid");
            $("#email").parent().children("div").remove("div");
            email_error = false;
        }
    }
}

var telphone_error = false;

function telphone_field_verification() {
    if ($("#telphone").val() == "") {
        if ($("#telphone").hasClass("valid")) {
            $("#telphone").remove("valid");
        }
        $("#telphone").addClass("invalid ");
        $("#telphone").parent().children("div").remove("div");
        $("#telphone")
            .parent()
            .append(
                '<div class = "invalid-feedback d-block " style="margin-top:-20px"> Champs non rempli </div>'
            );
        telphone_error = true;
    } else {
        if (isNaN($("#telphone").val())) {
            if ($("#telphone").hasClass("valid")) {
                $("#telphnone").remove("valid");
            }
            $("#telphone").addClass("invalid ");
            $("#telphone").parent().children("div").remove("div");
            $("#telphone")
                .parent()
                .append(
                    '<div class = "invalid-feedback d-block " style="margin-top:-20px"> Numero invalide </div>'
                );
            telphone_error = true;
        } else {
            if (
                $("#telphone").val().length < 8 ||
                $("#telphone ").val().length > 20
            ) {
                if ($("#telphone").hasClass("valid")) {
                    $("#telphone").remove("valid");
                }
                $("#telphone").addClass("invalid");
                $("#telphone").parent().children("div").remove("div");
                $("#telphone")
                    .parent()
                    .append(
                        '<div class = "invalid-feedback d-block " style="margin-top:-20px">Numero invalide</div>'
                    );
                telphone_error = true;
            } else {
                if ($("#telphone").hasClass("invalid")) {
                    $("#telphone").remove("invalid");
                }
                $("#telphone").addClass("valid");
                $("#telphone").parent().children("div").remove("div");
                telphone_error = false;
            }
        }
    }
}

var password_error = false;

function password_field_verification() {
    if ($("#password").val() == "") {
        if ($("#password").hasClass("valid")) {
            $("#password").remove("valid");
        }
        $("#password").addClass("invalid");
        $("#password").parent().children("div").remove("div");
        $("#password")
            .parent()
            .append(
                '<div class = "invalid-feedback d-block " style="margin-top:-20px"> Champs non rempli </div>'
            );
        password_error = true;
    } else if ($("#password").val().length < 4) {
        if ($("#password").hasClass("valid")) {
            $("#password").remove("valid");
        }
        $("#password").addClass("invalid");
        $("#password").parent().children("div").remove("div");
        $("#password")
            .parent()
            .append(
                '<div class = "invalid-feedback d-block " style="margin-top:-20px"> Mot de passe faible </div>'
            );
        password_error = true;
    } else {
        if ($("#password").hasClass("invalid")) {
            $("#password").remove("invalid");
        }
        $("#password").addClass("valid");
        $("#password").parent().children("div").remove("div");
        password_error = false;
    }
}


function get_trivia() {
    $.get("https://opentdb.com/api.php?amount=10", function(data) {
        $(".result").html(data.response_code);
        console.log(data);
        alert(data)
        alert("Load was performed.");
    });
}