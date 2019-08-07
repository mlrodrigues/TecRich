<?php

require_once "header.php";
?>
<html>
<head>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
        })
    </script>
</head>
<body>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="user/dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="profissionais.php" title="Go to Profissionais" class="tip-bottom"> Encontrar Profissionais</a></div>
  </div>

<div class="container-fluid">
<div class="row-fluid">
<div class="widget-box">
    <div class="widget-title bg-lg"><span class="icon"><i class="icon-cogs"></i></span>
        <h5>Filtrar Profissionais</h5>
    </div>

    <!--FORMULARIO DE PESQUISA-->
    <form action="user/buscar_profissionais.php" method="GET">
        <div class="controls">
        <select class="selectpicker">

        <?php
        $con = mysqli_connect('localhost','root','','tech');
        $query = sprintf("SELECT descricao as profissao FROM tbl_profissoes");
        $dados = mysqli_query($con,$query);
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        // se o número de resultados for maior que zero, mostra os dados
        if($total > 0) {
        // inicia o loop que vai mostrar todos os dados
        do {

        if (!isset($_SESSION)) session_start();
        // Salva os dados encontrados na sessão
        $_SESSION['profissoes'] = $linha['profissao'];
        ?>

          <option id="profissao" name="motivo" value="<?php echo $_SESSION['profissoes']?>"/><?php echo $_SESSION['profissoes']?></option>

        <?php
        }while($linha = mysqli_fetch_assoc($dados));
        // fim do if
        }
        ?>

        </select>
        </div> <input type="submit" value="Buscar" class="btn btn-primary">
    </form>
</div>
</div>
</div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
             <div id="buscar_pelos_profissionais" class="span6">

                <?php
                $con = mysqli_connect('localhost','root','','tech');
                $query = sprintf("SELECT tbl_usuario.nome, tbl_usuario.sobrenome, tbl_usuario.email, tbl_usuario.telefone, tbl_usuario.celular, tbl_profissoes.descricao FROM `tbl_usuario` INNER JOIN tbl_profissoes WHERE tbl_usuario.tbl_profissoes_id = tbl_profissoes_id");
                $dados = mysqli_query($con,$query);
                $linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
                // se o número de resultados for maior que zero, mostra os dados
                if($total > 0) {
                    // inicia o loop que vai mostrar todos os dados
                    do {
                        if (!isset($_SESSION)) session_start();
                        // Salva os dados encontrados na sessão
                        $_SESSION['profissionalnome'] = $linha['nome'];
                        $_SESSION['profissionalsobrenome'] = $linha['sobrenome'];
                        $_SESSION['profissionalemail'] = $linha['email'];
                        $_SESSION['profissionalprofissao'] = $linha['descricao'];
                        $_SESSION['profissionaltelefone'] = $linha['telefone'];
                        $_SESSION['profissionalcelular'] = $linha['celular'];


                        ?>
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
                                <h5><?php echo $_SESSION['profissionalnome'] ?></h5>
                            </div>
                        <div class="widget-content nopadding">
                            <div class="row-fluid">
                            <div class="span1"></div>
                            <div class="span6">
                                <ul class="recent-posts">
                                    <dt>Profissão</dt>
                                    <dd><?php echo $_SESSION['profissionalprofissao'] ?></dd>
                                    <dt>Telefones:</dt>
                                    <dd><?php echo $_SESSION['profissionaltelefone'] ?></dd>
                                    <dd><?php echo $_SESSION['profissionalcelular'] ?></dd>
                                    <dt>Email:</dt>
                                    <dd><?php echo $_SESSION['profissionalemail'] ?></dd>
                                </ul>
                            </div>
                        </div>

                        </div>
                        </div>
                        <?php
                    }while($linha = mysqli_fetch_assoc($dados));
                    // fim do if
                }
                ?>
                <?php
                // tira o resultado da busca da memória
                mysqli_free_result($dados);
                ?>
            </div>
        </div>
    </div>
    </div>
        <?php require_once "footer.php" ?>
</body>
</html>

