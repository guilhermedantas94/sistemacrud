<?php include_once "includs/autenticar.php"?>

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
                    <h1 class="h3 mb-4 text-gray-800">Castro de Clientes</h1>

                    <form action="gravar-cliente.php" method="POST" class="w-75">

                    <!-- nome email cpf estado civil -->

                        <input type="text" name="nome" required placeholder="Digite o nome" class="form-control mb-3">
                    
                        <input type="email" name="email" required placeholder="Digite o e-mail" class="form-control mb-3">

                        <input type="cpf" name="cpf" required maxlength="11" placeholder="Digite o cpf" class="form-control mb-3">

                        <select name="estadocivil"  required class="custom-select mb-3" >
                            <option value="" disabled selected>Estado Civil</option>
                            <option value="solteiro(a)">Solteiro(a)</option>
                            <option value="casado(a)">Casado(a)</option>
                            <option value="divorciado(a)">Divorciado(a)</option>
                            <option value="viuvo(a)">Viúvo(a)</option>

                        </select>

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

</body>

</html>