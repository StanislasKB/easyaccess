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
    <link rel="stylesheet" href="login.css">
</head>

<body>
<nav class="navbar navbar-expand-lg shadow text-white bg-access fixed-top">
  <div class="container py-2">
    <a class="navbar-brand text-white" href="../accueil/index.php">EasyAccess</a>
    
    
  </div>
</nav>
    <div class=" mx-sm-5 mx-md-0" style="height:100vh; ">
        <div class="row h-100 ">
            <div class="col-lg-6 col-xl-6 d-lg-block d-none  h-100 cote position-relative"
                style="border-top-left-radius: inherit; border-bottom-left-radius:inherit"
                id="img-box">
              <div class="h-100 d-flex flex-column justify-content-center align-items-center">
              <h1 class="display-3 text-white fw-bold">EasyAccess</h1>
               
              </div>
              <div class="position-absolute bottom-0 w-100">
                <p class="text-center text-white">La réussite commence chez nous</p>
              </div>
                <!-- <img src="../img/img.jpg " class=" w-100 h-100" id="img "
                    style="border-top-left-radius: inherit; border-bottom-left-radius:inherit;" /> -->
            </div>
            <div class="col-lg-6 col-xl-6 d-flex px-sm-5 px-lg-0 pe-lg-4  justify-content-center align-items-center"
                style="flex-wrap: wrap;height:fill-content; ">
                <div class="carte shadow-sm p-3">
                  
                <?php if(isset($_GET['code']) AND $_GET['code']==false)
              {
                echo '<span class="text-danger"> Informations incorrectes </span>';
              }?>
              
              <h2 class=" text-center mb-3">Connexion</h2>

                <form action="login.php" method="post" id="form " class="d-flex flex-column">
                    <div class="input_group mb-2">
                        <input type="email" name="loginmail" id="email " class="form-control ">
                        <label for="email">Email</label>
                    </div>
                    <div class="input_group mb-2">
                        <input type="password" name="loginpass" id="password "
                            class="form-control ">
                        <label for="password ">Mot de passe</label>
                    </div>
                    <input
                        class="btn bg-access text-white text-center col-8 py-2 rounded-pill mt-3 "
                        type="submit" value="Se connecter" />
                        <a href="../register" class="text-decoration-none mt-2">Je n'ai pas encore un compte</a>
                </form>
                </div>
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