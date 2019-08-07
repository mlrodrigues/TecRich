<?php
$con = mysqli_connect('localhost','root','','tech');
if (!isset($_SESSION)) session_start();
$id_usuario = $_SESSION['usuarioid'];
$id = $_GET['id'];

$query = "SELECT `id`, `descricao`, `data`, `finalidade`, `valor`, `tipo_transacao`, `tbl_usuario_id` FROM `tbl_financa` WHERE id = '$id'";
$query = mysqli_query($con,$query);
    // Salva os dados encontados na variável $resultado
    $resultado = mysqli_fetch_assoc($query);
    if (!isset($_SESSION)) session_start();
    $id = $_GET['id'];
    $valor = $resultado['valor'];
    $motivo = $resultado['descricao'];
    $finalidade = $resultado['finalidade'];
    $tipo_transacao = $resultado['tipo_transacao'];
    $data = $resultado['data'];
?>

