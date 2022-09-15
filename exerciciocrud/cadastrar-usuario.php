<?php 
session_start(); 

if($_SESSION["perfil"] == "user"){

    

    header("location:painel.php");
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Sistema CRUD</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    
    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">

    <style>
        label.error{
            color: red;
            font-size: 12px;
            
        }

        input.error{

            border: solid 1px red !important;
        }
    </style>
</head>


guidantas123
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
   <?php include_once "includs/sidebar.php" ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include_once "includs/topbar.php" ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Cadastrar Usuários</h1>

                <h5>Dados Pessoais</h5>    


                
                <form autocomplete="off"  enctype="multipart/form-data" action="gravar-usuario.php" method="post">

                    <!-- nome email cpf data de nascimento -->

                    <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="nome" placeholder="Digite o nome" class="form-control required">
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="text" name="email" placeholder="Digite o e-mail" class="form-control required email">
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="text" name="dtnasc"   id="dtnasc" placeholder="Digite sua data de Nascimento" class="form-control required dateBR">
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="text" name="cpf" id="cpf"  placeholder="Digite o CPF" class="form-control required cpf">
                            </div>


                            <div class="col-md-4 mb-3">
                                <input type="text" name="login" placeholder="Digite seu Login" minlength="3" class="form-control required">
                                <small id="msglogin"></small>
                            </div>

                            <div class="col-md-4 mb-3">
                                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" class="form-control required">
                            </div>

                            <div class="col-md-4 mb-3">
                                <input type="password" name="csenha" equalTo="#senha"  placeholder="Confirme sua senha" class="form-control required">
                            </div>

                            <div class="col-md-4 mb-3">
                                <select name="perfil"class="form-control">
                                    <option value="" disbled selected>Selecione o Perfil</option>
                                    <option value="adm">Administrador</option>
                                    <option value="user">Usuario</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="file" name="foto" class="form-control" accept=".jgp, .png, .gif, .svg">
                                <small><em>Foto do Usuário</em></small>

                            </div>
                    </div>
                            <hr>

                            <h5>Dados de Endereço</h5>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <input type="text" name="cep" id="cep" placeholder="Digite o cep" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <input type="text" name="logradouro" id="logradouro" placeholder="Digite o Logradouro" class="form-control">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <input type="text" name="numero" id="numero" placeholder="Número" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <input type="text" name="compl" placeholder="Complemento" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input type="text" name="cidade" id="cidade" placeholder="Cidade" class="form-control">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="text" name="uf" id="uf" placeholder="Uf" class="form-control">
                                </div>
                            </div>
                            
                    

                    

                    



                    <button class="btn btn-primary">Realizar Cadastro</button>



                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
       <?php include_once "includs/footer.php" ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->

<?php include_once "includs/modal.php" ?>


<!-- Bootstrap core JavaScript-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- 
    mascara de validação com Jquery
-->
<script src="js/maskedinput-1.4.1.js"></script>
<script src="js/jquery.validate.js"></script>



<script>
    //inicialização do Jquery

    $(document).ready(function(){

        $("#dtnasc").mask("99/99/9999");
        $("#cpf").mask('999.999.999-99');
        $("#cep").mask('99999-999');

        //$("form").validate();


        //ao sair do campo cep

        //Preparar um evento para ser

        $("#cep").blur(function(){
            //alert('ok');

            var cepDigitado = $("#cep").val();


            //$.getJSON()

            $.getJSON("https://viacep.com.br/ws/"+cepDigitado+"/json/",
            function(dados){
              $("#logradouro").val(dados.logradouro);
              $("#bairro").val(dados.bairro);
              $("#cidade").val(dados.localidade);
              $("#uf").val(dados.uf);

              $("#numero").focus();
              
             })
        })

    })

</script>


</body>