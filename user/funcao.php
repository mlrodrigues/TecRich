<?php

require_once "functions.php";
$inicio = $_POST['inicio'];
$fim = $_POST['fim'];
$finalidade = $_GET['finalidae'];

echo listar_contas_mes($inicio,$fim, $finalidade);
?>