<?php
if (!isset($_SESSION)) session_start();
$nivel_necessario = 2;
if (!isset($_SESSION['usuarioid']) OR ($_SESSION['usuariotipo_cliente'] != $nivel_necessario)) {
    session_destroy();
    header("Location: index.php");
    exit;
}
?>
<html lang="pt-br">
<head>
    <title>ProSystem | TecRich by Pointype</title>
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
    <h1><a href="index_pro.php">TecRich Panel</a></h1>
</div>

<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class=""><a title="" href="index_pro.php"><span class="text">Perfil Profissional </span></a></li>
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span class="text"><?php echo $_SESSION['usuarionome']?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="../pro/perfil_pro.php"><i class="icon-user"></i> Minha Conta</a></li><li class="divider"></li>
            </ul>
        </li>
        <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Sair</span></a></li>
    </ul>
</div>

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li><a href="../pro/index_pro.php"><i class="icon icon-home"></i> <span>Meu Perfil</span></a></li>
        <li><a href="../pro/perfil_pro.php"><i class="icon icon-cogs"></i> <span>Editar Dados</span></a></li>
    </ul>
</div>
