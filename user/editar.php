<?php
if (!isset($_SESSION)) session_start();
$con = mysqli_connect('localhost','root','','tech');

$id = $_SESSION['usuarioid'];
$nome       = $_POST["nome"];
$sobrenome  = $_POST["sobrenome"];
$usuario    = $_POST['usuario'];
$email      = $_POST["email"];
$cpf        = $_POST["cpf"];


if($nome == null || $sobrenome == null || $email == null || $cpf == null || $usuario == null) {
    echo "<script> alert('Preencha todos os campos!');window.location.href='editar.php';</script>";

}

$update  = mysqli_query($con,"UPDATE `tbl_usuario` SET `nome` = '$nome',`sobrenome` = '$sobrenome',`usuario` = '$usuario',`email` = '$email',`cpf` = '$cpf' WHERE `id` = '$id'");
if($update){
    // Salva os dados encontrados na sessão
    $_SESSION['usuarionome'] = $nome;
    $_SESSION['usuariosobrenome'] = $sobrenome;
    $_SESSION['usuariocpf'] = $cpf;
    $_SESSION['usuariousuario'] = $usuario;
    $_SESSION['usuarioemail'] = $email;
    echo "<script> alert ('Usuário alterado com sucesso!'); location.href='dashboard.php' </script>";
}
else{
    echo $mysqli->error;
}

?>