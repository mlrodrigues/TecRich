<?php
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);
$csenha = MD5($_POST['csenha']);

$con = mysqli_connect('localhost','root','','tech');
$selectusuario = "SELECT email FROM tbl_usuario WHERE email = '$email'";
$select = mysqli_query($con,$selectusuario);
$array = mysqli_fetch_array($select);
$logarray = $array['email'];

if($email == "" || $email == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo email deve ser preenchido');window.location.href='cadastro.php';</script>";

}
if ($senha != $csenha) {
    echo "<script language='javascript' type='text/javascript'>alert('As senhas não coincidem');window.location.href='cadastro.php';</script>";
}
else {
    if ($logarray == $email) {

        echo "<script language='javascript' type='text/javascript'>alert('Esse email já foi cadastrado!');window.location.href='index.php';</script>";
        die();

    } else {
        $query = "INSERT INTO `tbl_usuario`(`cpf`, `nome`, `sobrenome`, `usuario`, `email`, `senha`, `tipo_cliente`, `ativo` ) VALUES ('$cpf','$nome','$sobrenome','$usuario','$email','$senha','0','0')";
        $insert = mysqli_query($con, $query);

        if ($insert) {
            echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='../index.php'</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='../cadastro.php'</script>";
        }
    }
}
?>