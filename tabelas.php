<?php
// definições de host, database, usuário e senha

if (!isset($_SESSION)) session_start();
$id = $_SESSION['usuarioid'];
$con = mysqli_connect('localhost','root','','tech');
$mes_inicial = date('Y/m/01');
$mes_final = date('Y/m/31');
$query = sprintf("SELECT `id`,`descricao`, `data`, `valor` FROM `tbl_financa` WHERE tbl_usuario_id = '$id'");
$dados = mysqli_query($con,$query);
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>

<html>
    <head>
        <script language= 'javascript'>
            <!--
            function aviso(id){
                if(confirm (' Deseja realmente excluir? '))
                {
                    location.href="deletar_conta?id="+id;
                }
                else
                {
                    return false;
                }
            }
            //-->
        </script>
        <script>
            /*aki entra o codigo para editar as contas */
        </script>
    </head>
    <body>
    <?php
    // se o número de resultados for maior que zero, mostra os dados
    if($total > 0) {
        // inicia o loop que vai mostrar todos os dados
        do {
            ?>
            <tbody>
            <tr>
                <th><a href="user/editar_conta.php?id=<?php echo $linha['id']; ?>" class="btn btn-xs btn-warning">Editar</a>
                </th>
                <th><a href="javascript:aviso('<?php echo $linha['id']; ?>');" class="btn btn-xs btn-danger">Excluir</a>
                        <!--<i class="fa fa-trash"></i> Excluir-->
                </th>
                <td><?=date("d/m/Y", strtotime($linha['data']))?></td>
                <td><?=$linha['descricao']?></td>
                <td><?=$linha['valor']?></td>
            </tr>
        </tbody>
            <?php
            // finaliza o loop que vai mostrar os dados
        }while($linha = mysqli_fetch_assoc($dados));
        // fim do if
    }
    ?>
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
?>