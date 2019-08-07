<?php
$con = mysqli_connect('localhost','root','','tech');
if (!isset($_SESSION)) session_start();
$id = $_GET['id'];

$update  = mysqli_query($con,"UPDATE tbl_usuario SET cpf = '$cpf', nome = '$nome', sobrenome = '$sobrenome', usuario = '$usuario', email = '$email', ativo = '1' WHERE id = '$id'");
if($update){
    echo "<script> alert ('Usuário excluido com sucesso!'); location.href='../index.php' </script>";
}
else{
    echo $mysqli->error;
}

?>