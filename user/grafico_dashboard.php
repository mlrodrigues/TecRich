<?php
$con = mysqli_connect('localhost','root','','tech');
if (!isset($_SESSION)){
    session_start();
}
$id = $_SESSION['usuarioid'];
$inicio = date('Y-m-01');
$final = date('Y-m-31');
$sql_total_gasto = "SELECT SUM(valor) as gastos FROM tbl_financa WHERE tbl_usuario_id = '$id' and tipo_transacao = 'despesas' AND data BETWEEN '$inicio' and '$final'";
$resultado = mysqli_query($con,$sql_total_gasto);
while ($linha = mysqli_fetch_assoc($resultado)) {
    $_SESSION['total_gasto'] = $linha['gastos'];
}
$sql_total_ganho = "SELECT SUM(valor) as ganhos FROM tbl_financa WHERE tbl_usuario_id = '$id' and tipo_transacao = 'ganhos' AND data BETWEEN '$inicio' and '$final'";
$resultado = mysqli_query($con,$sql_total_ganho);
while ($linha = mysqli_fetch_assoc($resultado)) {
    $_SESSION['total_ganhos'] = $linha['ganhos'];
    $_SESSION['total_receita'] = $_SESSION['total_ganhos'] - $_SESSION['total_gasto'];
}
if(!isset($_SESSION['total_gasto']))
{
    $_SESSION['total_gasto'] = 0;

}
if (!isset($_SESSION['total_ganhos']))
{
    $_SESSION['total_ganhos'] = 0;
}