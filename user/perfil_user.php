<?php
require_once "header.php";
?>
    <script language= 'javascript'>
        <!--
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
        //-->
    </script>
<body>
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="perfil_user.php" title="Edit" class="tip-bottom"> Configuração</a></div>
  </div>
<!--End-breadcrumbs-->

<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Configurações de Conta</h5>
        </div>
        <div class="widget-content nopadding">
            <form action="editar.php" method="post">
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
			<div class="control-group">
              <label class="control-label">Email:</label>
              <div class="controls">
                  <input type="text" class="span11" name="email" value="<?php echo $_SESSION['usuarioemail']?>">
              </div>
			  <div class="controls">
                  <input type="text" class="span11" name="cemail" value="" placeholder="Confirme seu email">
              </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="javascript:aviso('<?php echo $_SESSION['usuarioid']; ?>');" class="btn btn-xs btn-danger">Excluir conta</a>
            </div>
          </form>
        </div>
      </div>

<?php require_once "footer.php"?>