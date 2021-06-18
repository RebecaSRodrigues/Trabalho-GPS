<?php
    include_once('../header.php');
    require '../classes/Servico.php';
    require '../classes/Servidor.php';
    require '../classes/Cliente.php';
    
    $servico = new Servico();
    $allServicos = $servico->selectAll();
?>

<div class="container">
        <h3 class="text-center pt-5">Lucro do administrador</h3>
        <a class="row d-flex justify-content-center" href="../index.php">
            <button type="button" class="btn btn-dark">Pagina Inicial</button>
        </a>
        <div class="container mt-3">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-fill">
                <thead class="thead-dark">
                    <tr>   
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Servidor</th>
                        <th>Tipo de Servico</th>
                        <th>Data de inicio</th>
                        <th>Data do fim</th>
                        <th>Valor Total</th>
                        <th>Lucro de Administrador</th>
                        <th>Valor do Funcionário</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allServicos as $servico): ?>
                        <tr>
                            <td><?= $servico['id'];?></td>
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
                            <td><?= $servico['preco_total']*0.3;?></td>
                            <td><?= $servico['preco_total']*0.7;?></td>
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