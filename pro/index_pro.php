<?php
require_once "header.php";
if (!isset($_SESSION)) session_start();
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index_pro.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <h4>Olá <?php echo $_SESSION['usuarionome']?>!</h4>
            <p>Este é seu perfil profissional, mantenha-o sempre atualizado para os clientes entrarem em contato com você.</p>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-cogs"></i> </span>
                        <h5> Situação do Perfil</h5>
                    </div>
                    <div class="widget-content">
                        <p>Ativo</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-cogs"></i> </span>
                        <h5>Situação do Perfil</h5>
                    </div>
                    <div class="widget-content">
                        <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Situação</th>
                            <th>Cargo</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><?php echo $_SESSION['usuarionome']?></td>
                            <td>Ativo</td>
                            <td><?php echo $_SESSION['proprofissao'] ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-cogs"></i> </span>
                        <h5> Dados Exibidos no Seu Perfil</h5>
                    </div>
                    <div class="widget-content">
                        <p>Ativo</p>
                    </div>
                </div>
            </div>
        </div>
        

        <!--Footer-part-->

        <?php require_once "footer.php" ?>


    </div>
</div>


