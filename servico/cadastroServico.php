<?php
    include_once('../header.php');
    require '../classes/Servico.php';
    require '../classes/Servidor.php';
    require '../classes/Cliente.php';

    $servidor = new Servidor();
    $allServidores = $servidor->selectAll();
    
    $cliente = new Cliente();
    $allClientes = $cliente->selectAll();
?>

<div class="container mt-5 div-form">
    <form class="form row g-3" action="" method="post">
        <div class="col-md-4">
            <label for="selectCliente" class="form-label">Cliente</label>
            <select class="form-select" name="selectCliente" id="selectCliente" aria-label="Selecione um cliente" required>
            <?php foreach ($allClientes as $cliente): ?>
                <option class="selectCliente" value="<?php echo $cliente['cpf'];?>"><?php echo $cliente['nomeCompleto'];?></option>
            <?php endforeach; ?>
            </select>            
        </div>
        <div class="col-md-4">
            <label for="selectServidor" class="form-label">Servidor</label>
            <select class="form-select" name="selectServidor" id="selectServidor" aria-label="Selecione um servidor">
                <?php foreach ($allServidores as $servidor): ?>
                    <option class="selectServidor" value="<?php echo $servidor['cpf'];?>"><?php echo $servidor['nomeCompleto'];?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="selectCategoria" class="form-label">Categoria do Serviço</label>
            <select class="form-select" name="selectCategoria" id="selectCategoria" aria-label="Selecione uma categoria">
                    <option class="selectCategoria" value="2">2 Horas</option>
                    <option class="selectCategoria" value="4">4 Horas</option>
                    <option class="selectCategoria" value="6">6 Horas</option>
                    <option class="selectCategoria" value="8">8 Horas</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputInicioDt" class="form-label">Data de Inicio</label>
            <input type="date" class="form-control" id="inputInicioDt" name="inputInicioDt">
        </div>
        <div class="col-md-2">
            <label for="inputFinalDt" class="form-label">Data Final</label>
            <input type="date" class="form-control" id="inputFinalDt" name="inputFinalDt">
        </div>
        <div class="col-md-6">
            <label for="inputServico" class="form-label">Tipo de Serviço</label>
            <input type="text" class="form-control" id="inputServico" name="inputServico">
        </div>
        <div class="col-md-2">
            <label for="inputPreco" class="form-label">Preço Total</label>
            <input type="number" min="1" step="any" class="form-control" id="inputPreco" name="inputPreco">
        </div>
        <div class="col-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary" name="insertButton">Cadastrar</button>
        </div>
    </form>
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
        $servico->setCategoriaServico($_POST["selectCategoria"]);
        
        $servico->insertServico();
    }
?>