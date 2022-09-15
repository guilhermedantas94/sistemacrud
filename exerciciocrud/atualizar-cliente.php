<?php
 



            $cod = $_POST["cod"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $cpf = $_POST["cpf"];
            $estadocivil = $_POST["estadocivil"];


            
            include_once "includs/conect.php";

            $sql = $con->prepare("update cliente set nome = ?, email = ?, cpf = ?, estadocivil = ? where cod = ?");

            $sql->bindParam(1, $nome);
            $sql->bindParam(2, $email);
            $sql->bindParam(3, $cpf);
            $sql->bindParam(4, $estadocivil);
            $sql->bindParam(5, $cod);

            if($sql->execute()){
                $msg = "Dados atualizados com sucesso!";
            
            }else{
                $msg =  "Erro ao gravar cliente";
            }
            
            ?>
            
            <script>
                alert("<?php echo $msg; ?>")
                location.href="cadastrar-cliente.php";
            </script>




