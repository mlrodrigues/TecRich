<?php 
$con = mysqli_connect('localhost','root','','tech');
if (!isset($_SESSION)){
    session_start();
}
		$id = $_SESSION['usuarioid'];
		
		$mes_inicial = date('Y-m-01');
		$mes_final = date('Y-m-31');

            $alimentacao = "SELECT COUNT(*) as alimento FROM tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = '$id' and finalidade = 'Alimentacao'";
            $educacao = "SELECT COUNT(*)as educacao from tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = '$id' and finalidade = 'Educacao'";
            $lazer = "SELECT COUNT(*) as lazer FROM tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = '$id' and finalidade = 'Lazer'";
            $moradia = "SELECT COUNT(*) as moradia FROM tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = '$id' and finalidade = 'Moradia'";
            $saude = "SELECT COUNT(*) as saude FROM tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = '$id' and finalidade = 'Saude'";
            $transporte = "SELECT COUNT(*) as transporte FROM tbl_financa WHERE data BETWEEN '$mes_inicial' and '$mes_final' and tbl_usuario_id = '$id' and finalidade = 'Transporte'";

			$result_alimentacao = mysqli_query($con,$alimentacao);
            $alimento = mysqli_fetch_assoc($result_alimentacao);
			$_SESSION['alimento'] = $alimento;
			
            $result_educacao = mysqli_query($con,$educacao);
            $educacao = mysqli_fetch_assoc($result_educacao);
			$_SESSION['educacao'] = $educacao;
			
            $result_lazer = mysqli_query($con,$lazer);
            $lazer = mysqli_fetch_assoc($result_lazer);
			$_SESSION['lazer'] = $lazer;
			
            $result_moradia = mysqli_query($con,$moradia);
            $moradia = mysqli_fetch_assoc($result_moradia);
			$_SESSION['$moradia'] = $moradia;
			
            $result_saude = mysqli_query($con,$saude);
            $saude = mysqli_fetch_assoc($result_saude);
			$_SESSION['$saude'] = $saude;
			
            $result_transporte = mysqli_query($con,$transporte);
            $transporte = mysqli_fetch_assoc($result_transporte);
			$_SESSION['$transporte'] = $transporte;
			
            $totalganho = "SELECT SUM(valor) as ganho FROM tbl_financa WHERE tbl_usuario_id = '$id' and tipo_transacao = 'ganho'";
            $eresult_entrada = mysqli_query($con,$totalganho);
            $entrada = mysqli_fetch_assoc($eresult_entrada);
			$_SESSION['entrada'] = $entrada;
			
            $totalperda = "SELECT SUM(valor) as perda FROM tbl_financa WHERE tbl_usuario_id = '$id' and tipo_transacao = 'despesa'";
            $eresult_saide = mysqli_query($con,$totalperda);
            $saida = mysqli_fetch_assoc($eresult_saide);
			$_SESSION['saida'] = $saida;
					
			