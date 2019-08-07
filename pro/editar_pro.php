<?php
if (!isset($_SESSION)) session_start();
$con = mysqli_connect('localhost','root','','tech');

$id = $_SESSION['usuarioid'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];

if($nome == null || $sobrenome == null || $email == null || $cpf == null || $usuario == null) {
    echo "<script> alert('Preencha todos os campos!');window.location.href='perfil_pro.php';</script>";

}
$update  = mysqli_query($con,"UPDATE `tbl_usuario` SET `cpf`='$cpf',`nome`='$nome',`sobrenome`='$sobrenome',`usuario`='$usuario',`email`='$email',`telefone`='$telefone',`celular`='$celular' WHERE `id`='$id'");
if($update){
       // Salva os dados encontrados na sessão
    $_SESSION['usuarioid'] = $id;
    $_SESSION['usuariocpf'] = $cpf;
    $_SESSION['usuarionome'] = $nome;
    $_SESSION['usuariosobrenome'] = $sobrenome;
    $_SESSION['usuariousuario'] = $usuario;
    $_SESSION['usuarioemail'] = $email;
    $_SESSION['usuariotelefone'] = $telefone;
    $_SESSION['protelefone'] = $telefone;
    $_SESSION['procelular'] = $celular;

    echo "<script> alert ('Usuário alterado com sucesso!'); location.href='index_pro.php' </script>";

}
else{
    echo "<script> alert ('Usuário não alterado!'); location.href='perfil_pro.php' </script>";
}
?>