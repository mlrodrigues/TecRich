<?php

require_once "buscar_conta.php";
?>
<div id="content">
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                    <h5>Editar</h5>
                </div>
                <div class="widget-content">
                    <div class="error_ex">
                        <form method="post" action="edit_conta.php?id=<?php echo $_GET['id']; ?>" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Valor:</label>
                                <div class="controls">
                                    <input id="valor" type="text" name="valor" class="span11" value="<?php echo $valor; ?>" />
                                </div>
                                <label class="control-label">Finalidade:</label>
                                <div class="controls">
                                    <input id="finalidade" type="text" name="motivo" class="span11" value="<?php echo $motivo; ?>" />
                                </div>
                                <label class="control-label">Data:</label>
                                <div class="controls">
                                    <input id="data" type="date" name="data" class="span11" value="<?php echo $data; ?>"/>
                                </div>

                            </div>
                            <div class="control-group">
                                <label class="control-label">Módulo:</label>
                                <div class="controls">
                                    <select name="tipo_transacao" id="modulo" class="span11" >
                                        <option value="<?php echo $tipo_transacao; ?>"><?php echo $tipo_transacao; ?></option>
                                        <option value="ganho">Ganho</option>
                                        <option value="despesa">Despesa</option>
                                    </select>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Tipo:</label>
                                    <div class="controls">
                                        <select name="finalidade" id="tipo" class="span11">
                                            <option value="<?php echo $finalidade; ?>"><?php echo $finalidade; ?></option>
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
                                    <button type="submit" class="btn btn-success">Atualizar</button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
