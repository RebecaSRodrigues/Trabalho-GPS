<?php
    include_once('../header.php');
    require '../classes/Cliente.php';
    
    $cliente = new Cliente();

    $allClientes = $cliente->selectAll();
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
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Logradouro</th>
                        <th>Numero</th>
                        <th>Bairro</th>
                        <th>Complemento</th>
                        <th>CEP</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Observacao</th>
                        <th>Status</th>
                        <th>Acao</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allClientes as $cliente): ?>
                        <tr>
                            <td><?php echo $cliente['cpf'];?></td>
                            <td><?php echo $cliente['nomeCompleto'];?></td>
                            <td><?php echo $cliente['logradouro'];?></td>
                            <td><?php echo $cliente['numero'];?></td>
                            <td><?php echo $cliente['bairro'];?></td>
                            <td><?php echo $cliente['complemento'];?></td>
                            <td><?php echo $cliente['cep'];?></td>
                            <td><?php echo $cliente['cidade'];?></td>
                            <td><?php echo $cliente['estado'];?></td>
                            <td><?php echo $cliente['email'];?></td>
                            <td><?php echo $cliente['celular'];?></td>
                            <td><?php echo $cliente['observacao'];?></td>
                            <?php if ($cliente['statusCliente'] == 1): ?>
                                <td>Ativo</td>
                            <?php else: ?>
                                <td>Inativo</td>
                            <?php endif; ?>  
                            <td>
                                <a href="gerenciamentocliente.php?cpf=<?= $cliente['cpf']; ?>&&metodo=status&&statusCliente=<?= $cliente['statusCliente']; ?>">
                                    <button class="btn btn-dark text-center" name="status" id="statusButton">Inativo/Ativo</button>
                                </a>
                                <a href="atualizacliente.php?cpf=<?php echo $cliente['cpf']; ?>&&metodo=edit">
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

    $cliente1 = new cliente();
    
    if (isset($_GET['CPF']) && $_GET['metodo'] == "status") {
        $cliente1->setCPF($_GET['CPF']);

        if ($_GET['statuscliente'] == 1) {
            $cliente1->setStatusCliente(false);
        } else {
            $cliente1->setStatusCliente(true);
        }
        
        $cliente1->ativocliente();
    }
?>