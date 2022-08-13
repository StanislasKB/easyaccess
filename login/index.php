<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connexion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <div class=" mx-sm-5 mx-md-0" style="height:748px; ">
        <div class="row h-100 ">
            <div class="col-lg-6 col-xl-6 d-lg-block d-none  h-100 "
                style="border-top-left-radius: inherit; border-bottom-left-radius:inherit"
                id="img-box">
                <img src="../img/img.jpg " class=" w-100 h-100" id="img "
                    style="border-top-left-radius: inherit; border-bottom-left-radius:inherit;" />
            </div>
            <div class="col-lg-6 col-xl-6 d-flex px-sm-5 px-lg-0 pe-lg-4  justify-content-center align-items-center"
                style="flex-wrap: wrap;height:fill-content; ">
                <h1 class=" text-center " id="inscription ">Connexion</h1>
                <?php if(isset($_GET['code']) AND $_GET['code']==false)
              {
                echo '<span class="text-danger"> Informations incorrectes </span>';
              }
      ?>
                <form action="login.php" method="post" id="form " class="w-100 row justify-content-center"
                    style="margin-top: -200px;">
                    <div class="input_group ">
                        <input type="email" name="loginmail" id="email " class="form-control ">
                        <label for="email">Email</label>
                    </div>
                    <div class="input_group ">
                        <input type="password" name="loginpass" id="password "
                            class="form-control ">
                        <label for="password ">Mot de passe</label>
                    </div>
                    <input
                        class="btn btn-outline-secondary text-center col-8 py-2 rounded-pill mt-3 "
                        type="submit" value="Se connecter" />
                </form>
            </div>
        </div>

    </div>

    </div>




    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
       // $(document).ready(
            /*
                        $(" #email, #password").click(
                            function () {
                                if ($(this).hasClass('invalid ')) {
                                    $(this).removeClass("invalid ");
                                    $(this).parent().children('div ').remove('div ');
                                } else if ($(this).hasClass('valid ')) {
                                    $(this).removeClass("valid ");
                                }
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
                        }),*/
            // $("#form").submit(function () {


            //     email_field_verification()
            //     password_field_verification()

            //     if (email_error == false &&
            //         password_error == false) {
            //         return true;
            //     } else {
            //         alert("Formulaire mal rempli");
            //         return false;
            //     }
            // }))
    </script>
</body>

</html>