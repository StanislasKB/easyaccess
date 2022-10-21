 <?php
    session_start();
    ?>
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
     <link rel="stylesheet" href="register.css">
 </head>

 <body>
     <nav class="navbar navbar-expand-lg shadow text-white bg-access fixed-top">
         <div class="container py-2">
             <a class="navbar-brand text-white" href="../accueil/index.php">EasyAccess</a>


         </div>
     </nav>
     <div class=" " style="height:100vh; ">
         <div class="row h-100 ">

             <div class="col-lg-6 col-xl-6 d-flex px-sm-5 px-lg-0 ps-lg-4   justify-content-center align-items-center" style="flex-wrap: wrap;height:fill-content; ">
                 <div class="carte shadow-sm p-3">
                     <h1 class=" text-start " id="text-white-50 ">Inscription</h1>
                     <?php if (isset($_GET['code']) and $_GET['code'] == false) {
                            echo '<span class="text-danger"> Informations invalides</span>';
                        }
                        if (isset($_GET['exist']) and $_GET['exist'] == true) {
                            echo '<span class="text-danger d-block"> Email déjà utilisé</span>';
                        }
                        ?>
                     <form action="register.php" method="post" id="form " class="d-flex flex-column needs-validation" novalidate>
                         <!-- <div class="input_group ">
                             <input type="text" name="lastname" id="lastname" class="form-control ">
                             <label for="lastname">Nom</label>
                         </div> -->
                         
                         <div>
                         <div class="form-floating mb-3 mt-3">
                             <input type="text" class="form-control" id="floatingInput" name="lastname"  placeholder="DESCHAMPS" required>
                             <label for="floatingInput">Nom </label>
                         </div>
                         <div class="invalid-feedback">
        Please choose a username.
      </div>
                         </div>

                         <!-- <div class="input_group ">
                             <input type="text" name="firstname" id="firstname" class="form-control ">
                             <label for="firstname">Prénoms</label>
                         </div> -->
                         <div class="form-floating mb-3 mt-3">
                             <input type="text" class="form-control" id="floatingInput" name="firstname" placeholder="Didier" required>
                             <label for="floatingInput">Prénom(s) </label>
                         </div>
                         <select name="selection" id="" class="form-control">
                             <option value="élève">Elève</option>
                             <option value="écolier">Ecolier</option>
                             <option value="Enseignant">Enseignant</option>
                             <option value="Autres">Autres</option>

                         </select>
                         <div class="form-floating mb-3 mt-3">
                             <input type="text" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                             <label for="floatingInput">Email </label>
                         </div>
                         <!-- <div class="input_group mt-3 ">
                        <input type="email" name="email" id="email" class="form-control ">
                        <label for="email">Email</label>
                    </div> -->
                         <!-- <div class="input_group ">
                        <input type="password" name="password" id="password" class="form-control ">
                        <label for="password" class=""> Mot de passe </label>
                    </div> -->
                         <div class="form-floating mb-3">
                             <input type="password" class="form-control" id="floatingPassword"  name="password" placeholder="Password" required>
                             <label for="floatingPassword">Mot de passe</label>
                         </div>
                         <!-- <div class="input_group ">
                             <input type="password" name="secondpassword" id="password2" class="form-control ">
                             <label for="password">Confirmation</label>
                         </div> -->
                         <div class="form-floating">
                             <input type="password" class="form-control" id="floatingPassword"  name="secondpassword" placeholder="Password" required>
                             <label for="floatingPassword">Confirmation</label>
                         </div>
                         <input class="btn bg-access text-white text-center col-10 py-2  rounded-pill mt-3 " type="submit" value="S 'enregistrer" />
                         <a href="../login" class="text-decoration-none mt-2">J'ai déjà un compte</a>

                     </form>
                 </div>
             </div>
             <div class="col-lg-6 col-xl-6 d-lg-block d-none  h-100 cote position-relative" style="border-top-left-radius: inherit; border-bottom-left-radius:inherit" id="img-box">
                 <div class="h-100 d-flex flex-column justify-content-center align-items-center">
                     <h1 class="display-3 text-white fw-bold">EasyAccess</h1>

                 </div>
                 <div class="position-absolute bottom-0 w-100">
                     <p class="text-center text-white">La réussite commence chez nous</p>
                 </div>
                 <!-- <img src="../img/img.jpg " class=" w-100 h-100" id="img "
                    style="border-top-left-radius: inherit; border-bottom-left-radius:inherit;" /> -->
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
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()







         $(document).ready(

             $("#firstname, #lastname, #email, #password").click(
                 function() {
                     if ($(this).hasClass('invalid')) {
                         $(this).removeClass("invalid ");
                         $(this).parent().children('div').remove('div');
                     } else if ($(this).hasClass('valid')) {
                         $(this).removeClass("valid ");
                     }
                 }),
             $("#firstname").keyup(function(e) {
                 firstname_field_verification()
                 e.preventDefault();
             }),
             $("#firstname").blur(function(e) {
                 firstname_field_verification()
                 e.preventDefault();
             }),
             $("#lastname").keyup(function(e) {
                 lastname_field_verification()
                 e.preventDefault();
             }),
             $("#lastname").blur(function(e) {
                 lastname_field_verification()
                 e.preventDefault();
             }),
             $("#email").keyup(function(e) {
                 e.preventDefault();
                 email_field_verification();
             }),
             $("#email").blur(function(e) {
                 e.preventDefault();
                 email_field_verification();
             }),
             $("#password").keyup(function(e) {
                 e.preventDefault();
                 password_field_verification();
             }),
             $("#password").blur(function(e) {
                 e.preventDefault();
                 password_field_verification();
             }),
             $("#form").submit(function() {

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