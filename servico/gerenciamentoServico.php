<?php
    include_once('../header.php');
    require '../classes/Servico.php';
    require '../classes/Servidor.php';
    require '../classes/Cliente.php';
    
    $servico = new Servico();
    $allServicos = $servico->selectAll();
?>

<div class="container">
        <h3 class="text-center pt-5">Cliente</h3>
        <a class="row d-flex justify-content-center" href="../index.php">
                <button type="button" class="btn btn-dark">Pagina Inicial</button>
        </a>
        <a class="row d-flex justify-content-center mt-2">
                <button type="button" class="btn btn-dark" onClick="window.location.href=window.location.href">Atualizar lista</button>
        </a>
        <div class="container mt-3">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-fill">
                <thead class="thead-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Servidor</th>
                        <th>Tipo de Servico</th>
                        <th>Data de inicio</th>
                        <th>Data do fim</th>
                        <th>Preco Total</th>
                        <th>Acao</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allServicos as $servico): ?>
                        <tr>
                            <?php
                                $cliente = new Cliente(); 
                                $cliente->setCpf($servico['cpf_cliente']);
                                $cl = $cliente->selectByCpf();
                            ?>
                            <td><?= $cl[0]['nomeCompleto'];?></td>

                            <?php
                                $servidor = new Servidor(); 
                                $servidor->setCpf($servico['cpf_servidor']);
                                $sv = $servidor->selectByCpf();
                            ?>
                            <td><?= $sv[0]['nomeCompleto'];?></td>

                            <td><?= $servico['tipo_servico'];?></td>
                            <td><?= $servico['dtInicio'];?></td>
                            <td><?= $servico['dtFinal'];?></td>
                            <td><?= $servico['preco_total'];?></td>
                            <td class="text-center">
                                <a href="#">
                                    <button class="btn btn-dark text-center" name="status" id="statusButton">Inativo/Ativo</button>
                                </a>
                                <a href="#">
                                    <button id="editar" class="btn btn-dark text-center mt-1" name="editar">Editar</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>

<?php 
    include_once('../footer.php');

    $servico = new Servico();
        
    if (isset($_POST['insertButton'])) {
        $servico->setCliente($_POST["selectCliente"]);
        $servico->setServidor($_POST["selectServidor"]);
        $servico->setDtInicio($_POST["inputInicioDt"]);
        $servico->setDtFinal($_POST["inputFinalDt"]);
        $servico->setTipoServico($_POST["inputServico"]);
        $servico->setPreco($_POST["inputPreco"]);
        
        $servico->insertServico();
    }
?>