<?php
//Acessando o espaço de mémoria do navegador
session_start();

    $login = $_POST["login"];
    $senha = md5($_POST["senha"]);

    include_once "includs/conect.php";

    $sql= $con->prepare("select * from usuario where login = ? and senha = ?");
    $sql->bindParam(1, $login);
    $sql->bindParam(2,$senha);

    $sql->execute();

    if($sql->rowCount()==1){

       // echo "ok";
        
       //pegando valores retornados do banco

       $row = $sql->fetch();

       //guardando valores em sessão
       $_SESSION["nome"] = $row["nome"];
       $_SESSION["perfil"] = $row["perfil"];
       $_SESSION["tempo"] = time(); //Guardando o instante do login 

        //Gerar log de acesso
        date_default_timezone_set("America/Sao_Paulo");
        $arquivo = fopen("log.txt","a+");

        fwrite($arquivo, "Usuário: ".$login." acessou o sistema em:".date("d/m/Y - H:i:s")."\n");
        fclose($arquivo);

       header("location:painel.php"); //redirecionamento em PHP

    }else{

        $msg = "Login/Senha inválido(s)";
        header("location:index.php?msg=".$msg);

    }






?>