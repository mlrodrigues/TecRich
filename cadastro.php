<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <title>Cadastro | TecRich</title><meta charset="UTF-8" />
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
    <form id="loginform" class="form-vertical" method="post" action="user/inserir_usuario.php">
        <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Nome" name="nome" required />
                </div>
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Sobrenome" name="sobrenome" required />
                </div>
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="CPF" name="cpf" required />
                </div>
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-tag"> </i></span><input type="text" placeholder="Crie um usuário" name="usuario" required />
                </div>
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-envelope"> </i></span><input type="email" placeholder="Email" name="email" required />
                </div>
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Digite uma Senha" name="senha" required />
                </div>
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Confirme sua Senha" name="csenha" required  />
                </div>
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="index.php">&laquo; Voltar ao login</a></span>
            <span class="pull-right"><button type="submit" class="btn btn-success">Cadastrar</button></span>
        </div>
    </form>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/matrix.login.js"></script>
</body>

</html>
