<?php 

function dataBanco($data){
        //Recebe uma data no formato dd/mm/aaaa e retorna aaaa-mm-dd

        $data = explode("/",$data);
        $data = array_reverse($data);
        $data = implode("-",$data);


        //Retornar o valor para quem chamou a função
        return $data;
    }

    function uploadFoto($foto){


        if($foto["size"] >0){
        //Gerar um nome para o arquivo
        $ext = explode(".",$foto["name"]);
        $ext = array_reverse($ext);
        $ext = $ext[0];
    
        $nomeFoto = date("YmdHis").rand(1000,9999).".".$ext;
    
        move_uploaded_file($foto["tmp_name"],"fotos/".$nomeFoto);
        
        }else{
            $nomeFoto = "perfil.svg";
    
        }
    
        return $nomeFoto;
    
       }
       
    ?>