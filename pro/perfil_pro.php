<?php
require_once "header.php";


?>
<body>
    <script language= 'javascript'>

        function aviso(id){
            if(confirm (' Deseja realmente excluir? '))
                {
                    location.href="delete_conta_usuario?id="+id;
                }
            else
                {
                    return false;
                }
        }
    </script>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index_pro.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="perfil_pro.php" title="Edit" class="tip-bottom"> Configuração</a></div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Configurações de Conta</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <div class="row-fluid">
                            <div class="span1"></div>
                            <div class="span10">
                                <form action="editar_pro.php" method="post">
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class="control-group">
                                                <label class="control-label">Name:</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="nome" value="<?php echo $_SESSION['usuarionome']?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Sobrenome:</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="sobrenome" value="<?php echo $_SESSION['usuariosobrenome']?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">CPF:</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="cpf" value="<?php echo $_SESSION['usuariocpf']?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Usuário: </label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="usuario" value="<?php echo $_SESSION['usuariousuario']?>">
                                                    <span class="help-block">Este é seu nome de usuário atual</span> </div>
                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div class="control-group">
                                                <label class="control-label">Email:</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="email" value="<?php echo $_SESSION['usuarioemail']?>">
                                                </div>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="cemail" value="" placeholder="Confirme seu email">
                                                </div>
                                            </div>
                                        <div class="control-group">
                                                <label class="control-label">Telefone: </label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="telefone" value="<?php echo $_SESSION['protelefone']?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Celular: </label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="celular" value="<?php echo $_SESSION['procelular']?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <button type="submit" class="btn btn-success">Salvar</button>
                                                <a href="javascript:aviso('<?php echo $_SESSION['usuarioid']; ?>');" class="btn btn-xs btn-danger">Excluir conta</a>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "footer.php"?>