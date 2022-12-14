<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inscription</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <div class=" " style="height:748px; ">
        <div class="row h-100 ">

            <div class="col-lg-6 col-xl-6 d-flex px-sm-5 px-lg-0 ps-lg-4  justify-content-center align-items-center"
                style="flex-wrap: wrap;height:fill-content; ">
                <h1 class=" text-center " id="inscription ">Inscription</h1>
                <?php if(isset($_GET['code']) AND $_GET['code']==false)
                {
                    echo '<span class="text-danger"> Informations invalides</span>';
                }
                if(isset($_GET['exist']) AND $_GET['exist']==true)
                {
                    echo'<span class="text-danger d-block"> Email déjà utilisé</span>';
                }
                ?>
                <form action="register.php" method="post" id="form " class="w-100 row justify-content-center"
                    style="margin-top: -200px;">
                    <div class="input_group ">
                        <input type="text" name="lastname" id="lastname" class="form-control ">
                        <label for="lastname">Nom</label>
                    </div>
                    <div class="input_group ">
                        <input type="text" name="firstname" id="firstname" class="form-control ">
                        <label for="firstname">Prénoms</label>
                    </div>
                    <select name="selection" id="" class="form-control">
                        <option value="eleve">Elève</option>
                        <option value="ecolier">Ecolier</option>
                        <option value="enseignant">Enseignant</option>

                    </select>
                    <div class="input_group mt-3 ">
                        <input type="email" name="email" id="email" class="form-control ">
                        <label for="email">Email</label>
                    </div>
                    <div class="input_group ">
                        <input type="password" name="password" id="password" class="form-control ">
                        <label for="password">Mot de passe</label>
                    </div>
                    <div class="input_group ">
                        <input type="password" name="secondpassword" id="password" class="form-control ">
                        <label for="password">Confirmation</label>
                    </div>
                    <input
                        class="btn btn-outline-secondary text-center col-10 py-2  rounded-pill mt-3 "
                        type="submit" value="S 'enregistrer" />
                </form>
            </div>
            <div class="col-lg-6 col-xl-6 d-lg-block d-none  h-100 "
                style="border-top-right-radius: inherit; border-bottom-right-radius:inherit"
                id="img-box">
                <img src="../img/img.jpg " class=" w-100 h-100" id="img "
                    style="border-top-right-radius: inherit; border-bottom-right-radius:inherit;" />
            </div>
        </div>

    </div>



    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <script src="../assets/js/script.js"></script>
    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(

            $("#firstname, #lastname, #email, #password").click(
                function () {
                    if ($(this).hasClass('invalid')) {
                        $(this).removeClass("invalid ");
                        $(this).parent().children('div').remove('div');
                    } else if ($(this).hasClass('valid')) {
                        $(this).removeClass("valid ");
                    }
                }),
            $("#firstname").keyup(function (e) {
                firstname_field_verification()
                e.preventDefault();
            }),
            $("#firstname").blur(function (e) {
                firstname_field_verification()
                e.preventDefault();
            }),
            $("#lastname").keyup(function (e) {
                lastname_field_verification()
                e.preventDefault();
            }),
            $("#lastname").blur(function (e) {
                lastname_field_verification()
                e.preventDefault();
            }),
            $("#email").keyup(function (e) {
                e.preventDefault();
                email_field_verification();
            }),
            $("#email").blur(function (e) {
                e.preventDefault();
                email_field_verification();
            }),
            $("#password").keyup(function (e) {
                e.preventDefault();
                password_field_verification();
            }),
            $("#password").blur(function (e) {
                e.preventDefault();
                password_field_verification();
            }),
            $("#form").submit(function () {

                firstname_field_verification()
                lastname_field_verification()
                email_field_verification()
                password_field_verification()

                if (firstname_error == false &&
                    lastname_error && email_error == false &&
                    password_error == false) {
                    return true;
                } else {
                    alert("Formulaire mal rempli");
                    return false;
                }
            }))
    </script>
</body>

</html>