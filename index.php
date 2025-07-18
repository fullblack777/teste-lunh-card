<?php
error_reporting(0);
if($_GET['logout'] === "true"){
session_start();
session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Headers </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/logostore.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./vendor/waves/waves.min.css">
    <link rel="stylesheet" href="./css/style.css">
      <script src="https://www.google.com/recaptcha/api.js?render=6LdTbUYpAAAAAI7sYLxfhMdgCwMtvLdBMIsEcBla"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">
<br>
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-xl-5 col-md-6">
                        <div class="auth-form card">
                            <div class="card-header justify-content-center">
                            <img class="mr-3 rounded-circle mr-0 mr-sm-3" src="images/logostor2.png" width="150"
                                        height="150" alt="">
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input id="usuario" type="text" class="form-control" placeholder="Usuario">
                                    </div>
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input id="senha" type="password" class="form-control" placeholder="Senha">
                                    </div>

                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group mb-0">
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox">
                                                <span class="toggle-switch"></span>
                                                <span class="toggle-label">Lembre de mim</span>
                                            </label>
                                        </div>
                                        <div class="form-group mb-0">
                                            <a target='blank' href="https://t.me/@shark_world">Esqueceu sua senha?</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button id="btn_login" type="button" class="btn btn-success btn-block">Entrar</button>
                                    </div>
                            
                                <div class="new-account mt-3">
                                    <p>Não tem uma conta? <a class="text-primary" href="register.php">Registrar-se</a></p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>


    </div>
<script src="css/jquery.min.js" type="text/javascript"></script>


<script type="text/javascript">

$("#btn_login").click(function(){
   $(this).text("Acessando...");
   $(this).attr("disabled", true);

var usuario = document.getElementById("usuario").value;
var senha = document.getElementById("senha").value;


grecaptcha.ready(function(){
grecaptcha.execute("6LdTbUYpAAAAAI7sYLxfhMdgCwMtvLdBMIsEcBla", {action: 'homepage'}).then(function(response){

 $.ajax({
  url: "auth/login.php",
  type: "POST",
  data: {
    "usuario": usuario, 
    "senha": senha,
    "g-recaptcha-response": response
  },
  dataType: "json",
  success: function(retorno){
    
    $("#btn_login").text("ACESSAR");
    $("#btn_login").attr("disabled", false);
    
  if(retorno.success == true){
    Swal.fire({title:"Sucesso:", icon: "success", text: "Usuario Logado", toast: true, position: "top-end", showConfirmButton: false, timer: 3000});
    setTimeout(function(){
  window.location.href = "store/";
    }, 3000);
    
  }else{
    Swal.fire({title:"Erro: ", icon:"error", text:retorno["message"], toast: true, position: "top-end", showConfirmButton:false, timer: 3000});
          }
        }
      }); //ajax
   });
 });
  
});

</script>

    <script src="./js/global.js"></script>
    
    <script src="./vendor/waves/waves.min.js"></script>

    <script src="./vendor/validator/jquery.validate.js"></script>
    <script src="./vendor/validator/validator-init.js"></script>

    <script src="./js/scripts.js"></script>
</body>

</html>