<?php 
    include_once('../header.php');
    require '../classes/Cliente.php';

    $clienteClass = new Cliente();
    $clienteClass->setCpf($_GET["cpf"]);

    $cliente = $clienteClass->selectByCpf()
?>

<!-- nome completo, CPF, endereço (logradouro, número, bairro, complemento, CEP, cidade e estado), e-mail, celular -->
<div class="container mt-5">
    <form class="form row g-3" action="" method="post">
        <div class="col-md-6">
            <label for="inputCpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="inputCpf" name="inputCpf" value="<?php echo $cliente[0]["cpf"] ?>" required disabled>
        </div>
        <div class="col-md-6">
            <label for="inputNome" class="form-label">Nome completo</label>
            <input type="text" class="form-control" id="inputNome" name="inputNome" value="<?php echo $cliente[0]["nomeCompleto"] ?>" required>
        </div>
        <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $cliente[0]["email"] ?>" required>
        </div>
        <div class="col-6">
            <label for="inputLogradouro" class="form-label">Logradouro</label>
            <input type="text" class="form-control" id="inputLogradouro" name="inputLogradouro" value="<?php echo $cliente[0]["logradouro"] ?>" required>
        </div>
        <div class="col-1">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="number" class="form-control" id="inputNumero" name="inputNumero" value="<?php echo $cliente[0]["numero"] ?>" required>
        </div>
        <div class="col-2">
            <label for="inputBairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="inputBairro" name="inputBairro" value="<?php echo $cliente[0]["bairro"] ?>" required>
        </div>
        <div class="col-2">
            <label for="inputComplemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="inputComplemento" name="inputComplemento" value="<?php echo $cliente[0]["complemento"] ?>" required>
        </div>
        <div class="col-2">
            <label for="inputCep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="inputCep" name="inputCep" value="<?php echo $cliente[0]["cep"] ?>" required>
        </div>
        <div class="col-md-2">
            <label for="inputCidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="inputCidade" name="inputCidade" value="<?php echo $cliente[0]["cidade"] ?>" required>
        </div>
        <div class="col-md-2">
            <label for="inputEstado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="inputEstado" name="inputEstado" value="<?php echo $cliente[0]["estado"] ?>" required>
        </div>
        <div class="col-md-5">
            <label for="inputCelular" class="form-label">Celular</label>
            <input type="text" class="form-control" id="inputCelular" name="inputCelular" value="<?php echo $cliente[0]["celular"] ?>" required>
        </div>
        <div class="col-md-5">
            <label for="inputObservacao" class="form-label">Observacao</label>
            <input type="text" class="form-control" id="inputObservacao" name="inputObservacao" value="<?php echo $cliente[0]["observacao"] ?>" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="updateButton">Atualizar</button>
        </div>
    </form>
</div>

<?php 
    include_once('../footer.php');

    $cliente1 = new Cliente();
        
    if (isset($_POST['updateButton'])) {
        $cliente1->setId($_GET["id"]);
        $cliente1->setNomeCompleto($_POST["inputNome"]);
        $cliente1->setEmail($_POST["inputEmail"]);
        $cliente1->setLogradouro($_POST["inputLogradouro"]);
        $cliente1->setNumero($_POST["inputNumero"]);
        $cliente1->setBairro($_POST["inputBairro"]);
        $cliente1->setComplemento($_POST["inputComplemento"]);
        $cliente1->setCep($_POST["inputCep"]);
        $cliente1->setCidade($_POST["inputCidade"]);
        $cliente1->setEstado($_POST["inputEstado"]);
        $cliente1->setCelular($_POST["inputCelular"]);
        $cliente1->setObservacao($_POST["inputObservacao"]);
        $cliente1->setStatusCliente(true);

        $cliente1->updateCliente();

    }
?>