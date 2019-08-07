<?php
$con = mysqli_connect('localhost','root','','tech');
if (!isset($_SESSION)) session_start();

$id = $_SESSION['usuarioid'];
$valor = $_POST['valor'];
$motivo = $_POST['motivo'];
$finalidade = $_POST['finalidade'];
$tipo_transacao = $_POST['tipo_transacao'];
$data = $_POST['data'];
$data_atual = date('Y-m-d');
if($data > $data_atual){
    echo "<script language='javascript' type='text/javascript'>alert('Você não pode inserir data posteriores a data atua!');window.location.href='user/dashboard.php'</script>";
}
else {

    $query = "INSERT INTO `tbl_financa`(`descricao`, `data`, `finalidade`, `valor`, `tipo_transacao`,`tbl_usuario_id` ) VALUES ('$motivo','$data','$finalidade','$valor','$tipo_transacao','$id')";
    $insert = mysqli_query($con, $query);
    if ($insert) {
        echo "<script language='javascript' type='text/javascript'>alert('Conta inserida com sucesso!');window.location.href='user/dashboard.php'</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Conta nao inserida!');window.location.href='user/dashboard.php'</script>";
    }
}