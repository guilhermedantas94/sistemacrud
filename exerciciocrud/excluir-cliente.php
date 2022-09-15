<?php

$cod = $_GET["cod"];//resgatando os dados

include_once "includs/conect.php";

$sql = $con->prepare("delete from cliente where cod = ?");
$sql->bindParam(1, $cod);

if($sql->execute()){
    $msg = "Cliente excluido com sucesso!";

}else{
    $msg =  "Erro ao gravar cliente";
}
?>
<script>
    alert("<?php echo $msg;?>");

    location.href="consultar-cliente.php"; 
</script>

