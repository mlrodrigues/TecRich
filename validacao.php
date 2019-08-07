<?php
// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
    header("Location: index.php"); exit;
}

$con = mysqli_connect('localhost','root','','tech');

$usuario = mysqli_real_escape_string($con,$_POST['usuario']);
$senha = mysqli_real_escape_string($con,$_POST['senha']);

// Validação do usuário/senha digitados
$sql = "SELECT `id`, `cpf`, `nome`, `sobrenome`, `usuario`, `email`, `senha`, `tipo_cliente`, `telefone`, `celular`, `ativo`, `tbl_profissoes_id` FROM `tbl_usuario` WHERE (`usuario` = '". $usuario ."') AND (`senha` = '". MD5($senha) ."') AND (`ativo` = 0) LIMIT 1";
$query = mysqli_query($con,$sql);
if (mysqli_num_rows($query) != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    echo "<script language='javascript' type='text/javascript'>alert('Login inválido!');window.location.href='index.php';</script>";
} else {
    // Salva os dados encontados na variável $resultado
    $resultado = mysqli_fetch_assoc($query);
    if (!isset($_SESSION)) session_start();
    // Salva os dados encontrados na sessão
    $_SESSION['usuarioid'] = $resultado['id'];
    $_SESSION['usuariocpf'] = $resultado['cpf'];
    $_SESSION['usuarionome'] = $resultado['nome'];
    $_SESSION['usuariosobrenome'] = $resultado['sobrenome'];
    $_SESSION['usuariousuario'] = $resultado['usuario'];
    $_SESSION['usuarioemail'] = $resultado['email'];
    $_SESSION['usuariosenha'] = $resultado['senha'];
    $_SESSION['usuariotipo_cliente'] = $resultado['tipo_cliente'];
    $_SESSION['proprofissao'] = $resultado['profissao'];
    $_SESSION['protelefone'] = $resultado['telefone'];
    $_SESSION['procelular'] = $resultado['celular'];
    $_SESSION['usuarioativo'] = $resultado['ativo'];

    if($_SESSION['usuariotipo_cliente'] == 0)
    {
        header("Location: user/dashboard.php"); exit;
    }
    elseif ($_SESSION['usuariotipo_cliente'] == 2)
    {
        header("Location: pro/index_pro.php"); exit;
    }

}
