<?php


   include_once "includs/funcoes.php";
    include_once "includs/conect.php";

    

   

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $dtnasc = dataBanco($_POST["dtnasc"]) ;
    $cpf = $_POST["cpf"];
    $login = $_POST["login"];
    $senha = md5( $_POST["senha"]);
    $perfil = $_POST["perfil"];

    $foto =uploadFoto($_FILES["foto"]) ;

    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $complemento = $_POST["compl"];
    $cep = $_POST["cep"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];
    $status = 'a';


    $con->beginTransaction(); 

    $sql = $con->prepare("insert into  usuario values(null,?,?,?,?,?,?,?,?,?)");
    $sql->bindParam(1, $nome);
    $sql->bindParam(2, $email);
    $sql->bindParam(3, $dtnasc);
    $sql->bindParam(4, $cpf);
    $sql->bindParam(5, $login);
    $sql->bindParam(6, $senha);
    $sql->bindParam(7, $perfil);
    $sql->bindParam(8, $foto);
    $sql->bindParam(9, $status);

    if($sql->execute()){
        //Gravou usuario, falta gravar endereço
        $codUsu = $con->lastInsertId();

        $sql2 = $con->prepare("insert into endereco values(null,?,?,?,?,?,?,?,?)");

        $sql2->bindParam(1, $logradouro);
        $sql2->bindParam(2, $numero);
        $sql2->bindParam(3, $complemento);
        $sql2->bindParam(4, $cep);
        $sql2->bindParam(5, $bairro);
        $sql2->bindParam(6, $cidade);
        $sql2->bindParam(7, $uf);
        $sql2->bindParam(8, $codUsu);

    if($sql2->execute()){
        echo "Gravado com sucesso";
        $con->commit(); //conrfima a transação
    }else{
        echo "Erro ao gravar endereço";
    }
    
    
    }else{
        echo"erro ao gravar usuario";
        $con->rollBack();
    }

?>