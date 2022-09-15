<?php session_start(); 

if(isset($_SESSION["user"])){

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

</head>

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
                    <h1 class="h3 mb-4 text-gray-800">Consulta de Clientes</h1>

                    <form action="consultar-cliente.php" method="get" class="w-75" autocomplete="off">
                
                    <div class="d-flex ">
                        <input type="text" name="nome" placeholder="Digiti o nome para pesquisar" class="form-control">
                        <button class="btn btn-primary ml-2">Buscar</button>
                    </div>

                    </form>

                       <?php
                    
                    // Se existe algo a ser pesquisado
                    if(isset($_GET["nome"])){
                       //Colsunta em banco de dados
                        //resgata o valor digitado no form
                       $nome = $_GET["nome"];

                       //abrindo conexao com banco de dados


                        include_once "includs/conect.php";

                        //preparando a  instrução

                        $sql = $con->prepare("select * from cliente where nome like ? '%' order by nome");
                        $sql->bindParam(1, $nome);
                        
                        //executa a instrução de consulta

                        $sql->execute();

                        //verifica se a consulta retornou algum resultado
                        if($sql->rowCount() >0){
                            echo "Encontro";

                        ?>
                        
                        <table class="table mt-5">


                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Cpf</th>
                                <th>Est. Civil</th>
                                <th class="text-center">Editar</th>
                                <?php if($_SESSION["perfil"] == "adm") { ?>
                                <th class="text-center">Excluir</th>
                                <?php } ?>
                            </tr>

                            <?php

                            //Buscar dados da proxima linha
                                while( $row = $sql->fetch()){
                            ?>

                            <tr>
                                <td><?php echo $row["nome"]; ?></td>
                                <td> <?php echo $row["email"]; ?></td>
                                <td><?php echo $row["cpf"]; ?></td>
                                <td> <?php echo $row["estadocivil"]; ?></td>
                                <td class="text-center"><a href="editar-cliente.php?cod=<?php echo $row[0]; ?>"><i class="far fa-edit text-success"></a></td>

                            
                                
                            
                                <?php if($_SESSION["perfil"] == "adm"){?>

                                
                                        <td class="text-center"><a href="#" onclick="confirmarExclusao(<?php echo $row[0]; ?>)"><i class="far fa-trash-alt text-danger"></i></a></td>
                                <?php } ?>
                            </tr>
                            
                        <?php } //Fim do loop ?>

                        </table>



                        <?php 

                        echo "Total de registro encontrados".$sql->rowCount();
                        }else{
                            echo"<h5>Nenhum cliente encontrado</h5>";
                        }
                    }

                       
                       ?> 

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

    <script>
        //criação da função

        function confirmarExclusao(cod){

            //alert('ok');

            if(confirm('Deseja realmente excluir este cliente?')){

                location.href = 'excluir-cliente.php?cod='+cod;
            }

        }
        
    </script>



</body>

</html>