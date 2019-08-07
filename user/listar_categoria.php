<?php
$con = mysqli_connect('localhost','root','','tech');
if (!isset($_SESSION)){
    session_start();
}
$id = $_SESSION['usuarioid'];

$mes_inicial = date('Y/01/01');
$mes_final = date('Y/12/31');

$sql_alimentacao = "SELECT SUM(valor) as alimentacao FROM tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = 
                        '$id' and tipo_transacao = 'despesas' and finalidade = 'Alimentação'";
$resultado = mysqli_query($con,$sql_alimentacao);
while ($linha = mysqli_fetch_assoc($resultado)) {
    $_SESSION['alimentacao'] = $linha['alimentacao'];
}

$sql_educacao = "SELECT SUM(valor) as educacao FROM tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = 
                        '$id' and tipo_transacao = 'despesas' and finalidade = 'Educacao'";
$resultado = mysqli_query($con,$sql_educacao);
while ($linha = mysqli_fetch_assoc($resultado)) {
    $_SESSION['educacao'] = $linha['educacao'];
}

$sql_lazer = "SELECT SUM(valor) as lazer FROM tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = 
                        '$id' and tipo_transacao = 'despesas' and finalidade = 'Lazer'";
$resultado = mysqli_query($con,$sql_lazer);
while ($linha = mysqli_fetch_assoc($resultado)) {
    $_SESSION['lazer'] = $linha['lazer'];
}

$sql_moradia = "SELECT SUM(valor) as moradia FROM tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = 
                        '$id' and tipo_transacao = 'despesas' and finalidade = 'Moradia'";
$resultado = mysqli_query($con,$sql_moradia);
while ($linha = mysqli_fetch_assoc($resultado)) {
    $_SESSION['moradia'] = $linha['moradia'];
}

$sql_receita = "SELECT SUM(valor) as receita FROM tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = 
                        '$id' and tipo_transacao = 'despesas' and finalidade = 'Receita'";
$resultado = mysqli_query($con,$sql_receita);
while ($linha = mysqli_fetch_assoc($resultado)) {
    $_SESSION['receita'] = $linha['receita'];
}

$sql_saude = "SELECT SUM(valor) as saude FROM tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = 
                        '$id' and tipo_transacao = 'despesas' and finalidade = 'Saude'";
$resultado = mysqli_query($con,$sql_saude);
while ($linha = mysqli_fetch_assoc($resultado)) {
    $_SESSION['saude'] = $linha['saude'];
}

$sql_transporte = "SELECT SUM(valor) as transporte FROM tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = 
                        '$id' and tipo_transacao = 'despesas' and finalidade = 'Transporte'";
$resultado = mysqli_query($con,$sql_transporte);
while ($linha = mysqli_fetch_assoc($resultado)) {
    $_SESSION['transporte'] = $linha['transporte'];
}

