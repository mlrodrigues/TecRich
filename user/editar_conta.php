<?php
require_once "buscar_conta.php";
?>
<?php
if (!isset($_SESSION)) session_start();
$nivel_necessario = 0;
if (!isset($_SESSION['usuarioid']) OR ($_SESSION['usuariotipo_cliente'] != $nivel_necessario)) {
    session_destroy();
    header("Location: index.php");
    exit;

}
?>
<html lang="pt-br">
<head>
    <title>TecRich | PoinType</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/fullcalendar.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="http://i.imgur.com/HIUuaMN.png" />
    <link rel="apple-touch-icon" href="http://i.imgur.com/HIUuaMN.png" />
    <link rel="shortcut icon" href="http://i.imgur.com/HIUuaMN.png" />
    <link rel="apple-touch-icon" href="http://i.imgur.com/HIUuaMN.png" />

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<div id="header">
    <h1><a href="dashboard.php">TecRich Panel</a></h1>
</div>

<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span class="text"><?php echo $_SESSION['usuarionome']?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="perfil_user.php"><i class="icon-user"></i> Minha Conta</a></li><li class="divider"></li>
            </ul>
        </li>
        <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Sair</span></a></li>
    </ul>
</div>

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>
    </ul>
</div>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>  <a href="#" title="Editconta" class="tip-bottom"><i class="icon-cogs"></i> Editar Dados</a></div>
    </div>

    <div class="row-fluid">
        <div class="span1"></div>
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                    <h5>Editar</h5>
                </div>
                <div class="widget-content">
                    <div class="error_ex">
                        <form method="post" action="edit_conta.php?id=<?php echo $_GET['id']; ?>" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Valor:</label>
                                <div class="controls">
                                    <input id="valor" type="text" name="valor" class="span11" value="<?php echo $valor; ?>" />
                                </div>
                                <label class="control-label">Finalidade:</label>
                                <div class="controls">
                                    <input id="finalidade" type="text" name="motivo" class="span11" value="<?php echo $motivo; ?>" />
                                </div>
                                <label class="control-label">Data:</label>
                                <div class="controls">
                                    <input id="data" type="date" name="data" class="span11" value="<?php echo $data; ?>"/>
                                </div>

                            </div>
                            <div class="control-group">
                                <label class="control-label">Módulo:</label>
                                <div class="controls">
                                    <select name="tipo_transacao" id="modulo" class="span11" >
                                        <option value="<?php echo $tipo_transacao; ?>"><?php echo $tipo_transacao; ?></option>
                                        <option value="ganho">Ganho</option>
                                        <option value="despesa">Despesa</option>
                                    </select>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Tipo:</label>
                                    <div class="controls">
                                        <select name="finalidade" id="tipo" class="span11">
                                            <option value="<?php echo $finalidade; ?>"><?php echo $finalidade; ?></option>
                                            <option value="Alimentacao">Alimentação</option>
                                            <option value="Educacao">Educação</option>
                                            <option value="Lazer">Lazer</option>
                                            <option value="Moradia">Moradia</option>
                                            <option value="Receita">Receita</option>
                                            <option value="Saude">Saúde</option>
                                            <option value="Transporte">Transporte</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Atualizar</button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>



