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
    <title>Registro | SECCXSTORE </title>
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
                        <form action="">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input id="usuario" type="text" class="form-control" placeholder="Usuario">
                                    </div>
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input id="senha" type="password" class="form-control" placeholder="Senha">
                                    </div>
                                    <div class="form-group">
                                        <label>Repita a senha</label>
                                        <input id="senhanovamente" type="password" class="form-control" placeholder="Senha">
                                    </div>

                                     <div class="form-group">
                                        <label>Convite para vendedor</label>
                                        <input id="convite" type="text" class="form-control" placeholder="Convite para vendedor (opcional)">
                                    </div>

                                    <div class="text-center">
                                        <button id="btn_cadastrar" class="btn btn-success btn-block">Cadastrar</button>
                                    </div>
                            
                                <div class="new-account mt-3">
                                    <p>Já tem uma conta? <a class="text-primary" href="index.php">Logue-se</a></p>
                                </div>
                            </div>
                        </form>
                        </div>
                </div>
            </div>
        </div>


    </div>
<script src="css/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

$("#btn_cadastrar").click(function(){
   $(this).text("Cadastrando...");
   $(this).attr("disabled", true);

var usuario = document.getElementById("usuario").value;
var senha = document.getElementById("senha").value;
var senhanovamente = document.getElementById("senhanovamente").value;
var convite = document.getElementById("convite").value;


grecaptcha.ready(function(){
grecaptcha.execute("6LdTbUYpAAAAAI7sYLxfhMdgCwMtvLdBMIsEcBla", {action: 'homepage'}).then(function(response){

 $.ajax({
  url: "auth/cadastro.php",
  type: "POST",
  data: {
    "usuario": usuario,
    "senha": senha,
    "senhanovamente": senhanovamente,
    "convite": convite,
    "g-recaptcha-response": response
  },
  dataType: "json",
  success: function(retorno){
  if(retorno.success == true){
    Swal.fire({title:"Sucesso:", icon: "success", text: "Usuario cadastrado. aguarde 3s", toast: true, position: "top-end", showConfirmButton: false, timer: 5000});
    setTimeout(function(){
  window.location.href = "index.php";
    }, 3000);
    
  }else{
    Swal.fire({title:"Erro: ", icon:"error", text:retorno["message"], toast: true, position: "top-end", showConfirmButton:false, timer: 5000});
          }
        }
      }); //ajax
     $("#btn_cadastrar").text("Cadastrar");
    $("#btn_cadastrar").attr("disabled", false);
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