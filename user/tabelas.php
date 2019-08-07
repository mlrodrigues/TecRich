<?php

if (!isset($_SESSION)) session_start();
$id = $_SESSION['usuarioid'];
$con = mysqli_connect('localhost','root','','tech');
$mes_inicial = date('Y/m/01');
$mes_final = date('Y/m/31');
$query = sprintf("SELECT `id`,`descricao`, `data`, `valor` FROM `tbl_financa` WHERE data BETWEEN '$mes_inicial' and '$mes_final' and `tbl_usuario_id` = '$id' and `tipo_transacao` = 'Despesa'");
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
                <td><?=date("d/m/Y", strtotime($linha['data']))?></td>
                <td><?=$linha['descricao']?></td>
                <td><?=$linha['valor']?></td>

                <th><a href="editar_conta.php?id=<?php echo $linha['id']; ?>" class="btn btn-xs btn-warning"><i class="icon-edit"></i></a>
                </th>
                <th><a href="javascript:aviso('<?php echo $linha['id']; ?>');" class="btn btn-xs btn-danger"><i class="icon-remove"></i></a>
                </th>
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