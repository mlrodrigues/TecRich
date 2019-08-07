<?php
require_once "header.php";
require_once "functions.php";
//require_once "listar_categoria_grafico.php";
?>

<div id="grafico pizza">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Finalidade', 'Porcentagem gasta'],
				['Educação', <?php echo $_SESSION['educacao'] ?>],
                ['Lazer', <?php echo $_SESSION['lazer'] ?>],
                ['Moradia', <?php echo $_SESSION['moradia'] ?>],
                ['Saúde', <?php echo $_SESSION['saude'] ?>],
                ['Transporte', <?php echo $_SESSION['transporte'] ?>>]
            ]);

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data);
        }
    </script>
</div>
<div id="grafica barra">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Meses', 'Ganhos', 'Despesas'],
                ['JAN', <?php echo $_SESSION['total_ganhos1'] ?>,<?php echo $_SESSION['total_gasto1'] ?>],
                ['FEV', <?php echo $_SESSION['total_ganhos2'] ?>,<?php echo $_SESSION['total_gasto2'] ?>],
                ['MAR', <?php echo $_SESSION['total_ganhos3'] ?>,<?php echo $_SESSION['total_gasto3'] ?>],
                ['ABR', <?php echo $_SESSION['total_ganhos4'] ?>,<?php echo $_SESSION['total_gasto4'] ?>],
                ['MAI', <?php echo $_SESSION['total_ganhos5'] ?>,<?php echo $_SESSION['total_gasto5'] ?>],
                ['JUN', <?php echo $_SESSION['total_ganhos6'] ?>,<?php echo $_SESSION['total_gasto6'] ?>],
                ['JUL', <?php echo $_SESSION['total_ganhos7'] ?>,<?php echo $_SESSION['total_gasto7'] ?>],
                ['AGO', <?php echo $_SESSION['total_ganhos8'] ?>,<?php echo $_SESSION['total_gasto8'] ?>],
                ['SET', <?php echo $_SESSION['total_ganhos9'] ?>,<?php echo $_SESSION['total_gasto9'] ?>],
                ['OUT', <?php echo $_SESSION['total_ganhos10'] ?>,<?php echo $_SESSION['total_gasto10'] ?>],
                ['NOV', <?php echo $_SESSION['total_ganhos11'] ?>,<?php echo $_SESSION['total_gasto11'] ?>],
                ['DEZ', <?php echo $_SESSION['total_ganhos12'] ?>,<?php echo $_SESSION['total_gasto12'] ?>]

            ]);

            var options = {
                vAxis: {format: 'currency'},
                curveType: 'function',
                legend: { position: 'right' }

            };

            var chart = new google.charts.Bar(document.getElementById('curve_chart'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
</div>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>  <a href="graficos.php" title="Go to Graphics" class="tip-bottom"><i class="icon-signal"></i> Graficos</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">

            <h4>Economias e Despesas</h4>
            <p>Os graficos abaixo possuem as informações gerais sobre sua renda. Dúvidas em relação à suas finanças? Procure um profissional na área que pode te ajudar Clicando Aqui.</p>
            <hr>
            <h5>Filtrar por Data:</h5>
            <form method="post" action="anual.php">
                <div class="controls">
                    <div class="row-fluid">
                    <div class="span3">
                        <p>Data Inicial:</p>
                        <input id="data" type="Month" name="inicio" class="span9"/>
                    </div>
                    <div class="span3">
                        <p>Data Final:</p>
                        <input id="data" type="Month" name="fim" class="span9"/>
                    </div>
                    <div class="span3">
                        <p>.</p>
                        <button type="submit" class="btn btn-success">Filtrar</button>
                    </div>
                    </div>
                </div>
            </form>

        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                        <h5> Situação mensal</h5>
                    </div>
                    <div class="widget-content">
                        <div id="curve_chart" style="width: 1050px; height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="span3">
                <div class="widget-title">
                    <h5>Os Dados abaixo se referem aos gastos realizados neste mês pelo usuário</h5>
                </div>
                <ul class="site-stats2">
                    <div class="widget-content" >
                        <div class="row-fluid">
                            <form method="get" action="view_anual.php">
                                <p><button type="submit" class="btn btn-success" href="view.php" name="finalidade" value="Alimentacao"><i class="icon-leaf"></i> Alimentação</button></p>
                                <p><button type="submit" class="btn btn-success" href="view.php" name="finalidade" value="Educacao"><i class="icon-home"></i> Educação</button></p>
                                <p><button type="submit" class="btn btn-success" href="view.php" name="finalidade" value="Lazer"><i class="icon-globe"></i> Lazer</button></p>
                                <p><button type="submit" class="btn btn-success" href="view.php" name="finalidade" value="Moradia"><i class="icon-home"></i> Moradia</button></p>
                                <p><button type="submit" class="btn btn-success" href="view.php" name="finalidade" value="Saude"><i class="icon-heart"></i> Saúde</button></p>
                                <p><button type="submit" class="btn btn-success" href="view.php" name="finalidade" value="Transporte"><i class="icon-move"></i> Transporte</button></p>
                                <hr>
                                <p><button type="submit" class="btn btn-success" href="view.php" name="finalidade" value="Receita"><i class="icon-money"></i> Receita</button></p>
                            </form>
                        </div>
                </ul>
            </div>
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                        <h5>Resumo de Gastos</h5>
                    </div>
                    <div class="widget-content">
                    <div class="pie">
                        <div id="piechart" style="width: 550px; height: 300px;"></div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!--Footer-part-->

        <?php require_once "footer.php" ?>


    </div>
</div>


