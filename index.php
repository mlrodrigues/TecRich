<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | TecRich</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="http://i.imgur.com/HIUuaMN.png" />
    <link rel="apple-touch-icon" href="http://i.imgur.com/HIUuaMN.png" />

</head>
<body>
<div id="loginbox">
    <form id="loginform" class="form-vertical" method="post" action="validacao.php">
        <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Usuário" name="usuario" required autofocus />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="senha" required />
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a href="#" id="to-recover">Esqueceu sua senha?</a></span><span class="pull-left"> | <a href="cadastro.php" id="cadastroform"> Cadastrar</a></span> | <span><a href="cadastro_pro.php" id="cadastroform"> Cadastrar Profissional</a></span>
            <span class="pull-right"><button type="submit" class="btn btn-success" >Entrar</button></span>
        </div>
    </form>
    <!--OUTROOOS FORMS-->
    <form id="recoverform" action="#" class="form-vertical">

        <p class="normal_text">Coloque o seu email no campo a paixo e siga as instruções que serão enviadas para o email inserido.</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail cadastrado" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" id="to-login">&laquo; Voltar ao login</a></span>
            <span class="pull-right"><a class="flip-link btn btn-success"/>Enviar email</a></span>
        </div>
    </form>
    <!---->
</div>


<script src="js/jquery.min.js"></script>
<script src="js/matrix.login.js"></script>
</body>

</html>
