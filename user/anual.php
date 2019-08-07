<?php
require_once "functions.php";
$inicio = $_POST['inicio'];
$fim = $_POST['fim'];


echo listar_ganhos_e_gastos_anual($inicio,$fim);
?>