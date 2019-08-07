<?php
require_once "header.php";
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
                ['MÊS ATUAL', 100,100]
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
                        <h5>Dados inseridos nesta categoria</h5>
                    </div>
                    <h5>Filtrar por Data:</h5>
                    <form method="post" action="funcao.php">
                        <div class="controls">
                            <div class="row-fluid">
                                <div class="span3">
                                    <p>Data Inicial:</p>
                                    <input id="data" type="date" name="inicio" class="span11"/>
                                </div>
                                <div class="span3">
                                    <p>Data Final:</p>
                                    <input id="data" type="date" name="fim" class="span11"/>
                                </div>
                                <div class="span3">
                                    <p>.</p>
                                    <button type="submit" class="btn btn-success">Filtrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="widget-content" >
                        <div class="row-fluid">
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
                                <?php

                                if (!isset($_SESSION)) session_start();
                                $id = $_SESSION['usuarioid'];
                                $finalidade = $_GET['finalidade'];
                                $con = mysqli_connect('localhost','root','','tech');
                                $mes_inicial = date('Y/m/01');
                                $mes_final = date('Y/m/31');
                                $query = sprintf("SELECT `id`,`descricao`, `data`, `valor` FROM `tbl_financa` WHERE finalidade = '$finalidade' AND tbl_usuario_id = '$id'");
                                $dados = mysqli_query($con,$query);
                                $linha = mysqli_fetch_assoc($dados);
                                // calcula quantos dados retornaram
                                $total = mysqli_num_rows($dados);
                                ?>
                                <html>
                                <head>
                                    <script language= 'javascript'>
                                        <!--
                                        function aviso(id){
                                            if(confirm (' Deseja realmente excluir? '))
                                            {
                                                location.href="deletar_conta?id="+id;
                                            }
                                            else
                                            {
                                                return false;
                                            }
                                        }
                                        //-->
                                    </script>
                                </head>
                                <body>
                                <?php
                                // se o número de resultados for maior que zero, mostra os dados
                                if($total > 0) {
                                    // inicia o loop que vai mostrar todos os dados
                                    do {
                                        ?>
                                        <tbody>
                                        <tr>
                                            <td><?=date("d/m/Y", strtotime($linha['data']))?></td>
                                            <td><?=$linha['descricao']?></td>
                                            <td><?=$linha['valor']?></td>

                                            <th><a href="editar_conta.php?id=<?php echo $linha['id']; ?>" class="btn btn-xs btn-warning"><i class="icon-edit"></i></a>
                                            </th>
                                            <th><a href="javascript:aviso('<?php echo $linha['id']; ?>');" class="btn btn-xs btn-danger"><i class="icon-remove"></i></a>
                                            </th>
                                        </tr>
                                        </tbody>
                                        <?php
                                        // finaliza o loop que vai mostrar os dados
                                    }while($linha = mysqli_fetch_assoc($dados));
                                    // fim do if
                                }

                                ?>
                                <?php
                                // tira o resultado da busca da memória
                                mysqli_free_result($dados);
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="span3">
                <div class="widget-box">
                    <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                        <h5>Outros</h5>
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
                                <p><button type="submit" class="btn btn-success" href="view.php" name="finalidade" value="Receita"><i class="icon-money"></i> Receita</button></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
<?php require_once "footer.php"?>