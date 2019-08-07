<?php
$con = mysqli_connect('localhost','root','','tech');
if (!isset($_SESSION)) session_start();

$id_usuario = $_SESSION['usuarioid'];
$id = $_GET['id'];
$valor = $_POST['valor'];
$motivo = $_POST['motivo'];
$finalidade = $_POST['finalidade'];
$tipo_transacao = $_POST['tipo_transacao'];
$data = $_POST['data'];

$query = "UPDATE tbl_financa SET `descricao` = '$motivo', `data` = '$data', `finalidade` = '$finalidade', `valor` = '$valor', `tipo_transacao` = '$tipo_transacao',`tbl_usuario_id` = '$id_usuario' WHERE `id` = '$id'";
$insert = mysqli_query($con, $query);

if ($insert) {
    echo "<script language='javascript' type='text/javascript'>alert('Conta editada com sucesso!');window.location.href='user/dashboard.php'</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>alert('Conta não editada!');window.location.href='user/dashboard.php'</script>";
}