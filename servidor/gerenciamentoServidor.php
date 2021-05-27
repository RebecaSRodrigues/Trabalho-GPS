<?php
    include_once('../header.php');
    require '../classes/Servidor.php';
    
    $servidor = new Servidor();

    $allservidores = $servidor->selectAll();
?>

	<div class="container">
        <h3 class="text-center pt-5">Servidores</h3>
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
                    <?php foreach ($allservidores as $servidor): ?>
                        <tr>
                            <td><?php echo $servidor['cpf'];?></td>
                            <td><?php echo $servidor['nomeCompleto'];?></td>
                            <td><?php echo $servidor['logradouro'];?></td>
                            <td><?php echo $servidor['numero'];?></td>
                            <td><?php echo $servidor['bairro'];?></td>
                            <td><?php echo $servidor['complemento'];?></td>
                            <td><?php echo $servidor['cep'];?></td>
                            <td><?php echo $servidor['cidade'];?></td>
                            <td><?php echo $servidor['estado'];?></td>
                            <td><?php echo $servidor['email'];?></td>
                            <td><?php echo $servidor['celular'];?></td>
                            <td><?php echo $servidor['observacao'];?></td>
                            <?php if ($servidor['statusServidor'] == 1): ?>
                                <td>Ativo</td>
                            <?php else: ?>
                                <td>Inativo</td>
                            <?php endif; ?>  
                            <td>
                                <a href="gerenciamentoServidor.php?cpf=<?= $servidor['cpf']; ?>&&metodo=status&&statusServidor=<?= $servidor['statusServidor']; ?>">
                                    <button class="btn btn-dark text-center" name="status" id="statusButton">Inativo/Ativo</button>
                                </a>
                                <a href="atualizaServidor.php?cpf=<?php echo $servidor['cpf']; ?>&&metodo=edit">
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

    $servidor1 = new Servidor();
    
    if (isset($_GET['cpf']) && $_GET['metodo'] == "status") {
        $servidor1->setCPF($_GET['cpf']);

        if ($_GET['statusServidor'] == 1) {
            $servidor1->setStatusServidor(false);
        } else {
            $servidor1->setStatusServidor(true);
        }
        
        $servidor1->ativoServidor();
    }
?>