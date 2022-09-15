<?php
 




            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $cpf = $_POST["cpf"];
            $estadocivil = $_POST["estadocivil"];


            
            include_once "includs/conect.php";

            $sql = $con->prepare("insert into cliente values(null, ?, ?, ?, ?)");

            $sql->bindParam(1, $nome);
            $sql->bindParam(2, $email);
            $sql->bindParam(3, $cpf);
            $sql->bindParam(4, $estadocivil);

            if($sql->execute()){
                $msg = "Dados gravados com sucesso!";
            
            }else{
                $msg =  "Erro ao gravar cliente";
            }
            
            ?>
            
            <script>
                alert("<?php echo $msg; ?>")
                location.href="cadastrar-cliente.php";
            </script>




