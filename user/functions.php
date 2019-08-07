<?php

function listar_ganhos_e_gastos_mensal(){
    $con = mysqli_connect('localhost','root','','tech');
    if (!isset($_SESSION)){
        session_start();
        $id = $_SESSION["usuarioid"];
    }
    $inicio = date('Y-m-d');
    $final = date('Y-m-d');
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
}

function listar_ganhos_e_gastos_anual($inicio, $final){

    $dateinicio = new DateTime($inicio);
    $datefinal = new DateTime($final);
    $interval = new DateInterval('P1M');

    $finalmente = $datefinal->format('Y-m-31');
    $inicialmente = $dateinicio->format('Y-m-01');

    $inicialmente = new DateTime($inicialmente);
    $finalmente = new DateTime($finalmente);
    $diferenca = $inicialmente->diff($finalmente);

    if ($diferenca->format('%a') >= "360"){
        $con = mysqli_connect('localhost','root','','tech');
        if (!isset($_SESSION)){
            session_start();
            $id = $_SESSION['usuarioid'];
        }
        for($i = 1; $i <= 12; $i++){

            $inicial = $dateinicio->format('Y-m-01') . "<br>";
            $fim = $dateinicio->format('Y-m-31') . "<br>";

            $sql_total_gasto = "SELECT SUM(valor) as gastos FROM tbl_financa WHERE tbl_usuario_id = '$id' and tipo_transacao = 'despesas' AND data BETWEEN '$inicial' and '$fim'";
            $resultado = mysqli_query($con,$sql_total_gasto);
            while ($linha = mysqli_fetch_assoc($resultado)) {
                $_SESSION['total_gasto'.$i] = $linha['gastos'];
            }
            $sql_total_ganho = "SELECT SUM(valor) as ganhos FROM tbl_financa WHERE tbl_usuario_id = '$id' and tipo_transacao = 'ganhos' AND data BETWEEN '$inicial' and '$fim'";
            $resultado = mysqli_query($con,$sql_total_ganho);
            while ($linha = mysqli_fetch_assoc($resultado)) {
                $_SESSION['total_ganhos'.$i] = $linha['ganhos'];
                //$_SESSION['total_receita'] = $_SESSION['total_ganhos'] - $_SESSION['total_gasto'];
            }

            if(!isset($_SESSION['total_gasto'.$i]))
            {
                $_SESSION['total_gasto'.$i] = 0;

            }
            if (!isset($_SESSION['total_ganhos'.$i]))
            {
                $_SESSION['total_ganhos'.$i] = 0;
            }
            $dateinicio->add($interval);
        }
        header("Location: graficos.php");
    }
    else{
        echo  "<script>alert( 'O intervarlo deve ser anual!' ); document.location='graficos.php';</script>";
    }

}


