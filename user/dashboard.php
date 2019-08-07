<?php
require_once "header.php";
require_once "grafico_dashboard.php";
?>

    <link rel="shortcut icon" href="http://i.imgur.com/HIUuaMN.png" />
    <link rel="apple-touch-icon" href="http://i.imgur.com/HIUuaMN.png" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Meses', 'Ganhos', 'Despesas'],
                ['MÊS ATUAL', <?php echo $_SESSION['total_ganhos'] ?>,<?php echo $_SESSION['total_gasto'] ?>]
            ]);

            var options = {
                vAxis: {format: 'currency'},
                curveType: 'function',
                legend: { position: 'right' }
            };

            var chart = new google.charts.Bar(document.getElementById('curve_chart'));

            chart.draw(data, google.charts.Bar.convertOptions(options));

            var btns = document.getElementById('btn-group');

            btns.onclick = function (e) {

                if (e.target.tagName === 'BUTTON') {
                    options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            }
        }
    </script>

<body>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>

    <div class="row-fluid">
        <div class="span1"></div>
        <div class="span7">
        <div class="widget-box">
            <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                <h5>Grafico de Despesas</h5>
            </div>
            <div class="widget-content" >
                <div class="row-fluid">
                        <div id="curve_chart" style="width: 570px; height: 300px;"></div>
                </div>
                <p></p>
            </div>
        </div>
        </div>

        <div class="span3">
        <div class="widget-box">
            <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                <h5>Resumo</h5>
            </div>
            <div class="widget-content" >
                <div class="row-fluid">
                        <form method="get" action="view.php">
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
            </div>
        </div>
    </div>
</div>

    <div class="row-fluid">
        <div class="span1"></div>
        <div class="span4">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                    <h5>Cadastrar Nova Conta</h5>
                </div>
                <div class="widget-content">
                    <div class="error_ex">
                        <form method="post" action="../inserir_conta.php">
                            <div class="control-group">
                                <label class="control-label">Valor:</label>
                                <div class="controls">
                                    <input id="valor" type="text" name="valor" class="span11" placeholder="Ex: 300.90" />             
                                </div>
                                <label class="control-label">Descrição:</label>
                                <div class="controls">
                                    <input id="motivo" type="text" name="motivo" class="span11" placeholder="Ex: Salário" />
                                </div>
                                <label class="control-label">Data:</label>
                                <div class="controls">
                                    <input id="data" type="date" name="data" class="span11"/>
                                </div>

                            </div>
                            <div class="control-group">
                                <label class="control-label">Módulo:</label>
                                <div class="controls">
                                    <select name="tipo_transacao" id="modulo" class="span11">
                                        <option value="ganhos">Ganhos</option>
                                        <option value="despesas">Despesas</option>
                                    </select>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Tipo:</label>
                                    <div class="controls">
                                        <select name="finalidade" id="finalidade" class="span11">
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
                                    <button type="submit" class="btn btn-success">Inserir</button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span1"></div>
        <div class="span5">                
                    <h5>Listas de Contas Cadastradas Hoje</h5>
                    <hr>
                    <table id="tbleditavel" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Data</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                        </thead>
                        <?php require_once "tabelas.php" ?>
                    </table>
                </div>
            </div>
</div>
<?php require_once "footer.php"?>