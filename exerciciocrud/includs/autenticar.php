<?php 

    session_start(); 

    if(!isset($_SESSION["nome"])){

        session_destroy();

        $msg = "Acesso negado!";
        header("location:index.php?msg=".$msg);
    }
    //Verificar se o tempo de uso foi atingindo
    elseif($_SESSION["tempo"] + 5*60 < time()){
        session_destroy();
        $msg = "Sessão expirada!";
        header("location:index.php?msg=".$msg);

    }else{

        $_SESSION["tempo"] = time();

    }
?>