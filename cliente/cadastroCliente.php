<?php 
    include_once('../header.php');
    require '../classes/Cliente.php';
?>

<!-- nome completo, CPF, endereço (logradouro, número, bairro, complemento, CEP, cidade e estado), e-mail, celular -->
<div class="container mt-5 div-form">
    <form class="form row g-3" action="" method="post">
        <div class="col-md-6">
            <label for="inputCpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="inputCpf" name="inputCpf" required>
        </div>
        <div class="col-md-6">
            <label for="inputNome" class="form-label">Nome completo</label>
            <input type="text" class="form-control" id="inputNome" name="inputNome" required>
        </div>
        <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
        </div>
        <div class="col-6">
            <label for="inputLogradouro" class="form-label">Logradouro</label>
            <input type="text" class="form-control" id="inputLogradouro" name="inputLogradouro" required>
        </div>
        <div class="col-1">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="number" class="form-control" id="inputNumero" name="inputNumero" required>
        </div>
        <div class="col-2">
            <label for="inputBairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="inputBairro" name="inputBairro" required>
        </div>
        <div class="col-2">
            <label for="inputComplemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="inputComplemento" name="inputComplemento" required>
        </div>
        <div class="col-2">
            <label for="inputCep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="inputCep" name="inputCep" required>
        </div>
        <div class="col-md-2">
            <label for="inputCidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="inputCidade" name="inputCidade" required>
        </div>
        <div class="col-md-2">
            <label for="inputEstado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="inputEstado" name="inputEstado" required>
        </div>
        <div class="col-md-5">
            <label for="inputCelular" class="form-label">Celular</label>
            <input type="text" class="form-control" id="inputCelular" name="inputCelular" required>
        </div>
        <div class="col-md-5">
            <label for="inputObservacao" class="form-label">Observacao</label>
            <input type="text" class="form-control" id="inputObservacao" name="inputObservacao" required>
        </div>
        <div class="col-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary" name="insertButton">Cadastrar</button>
        </div>
    </form>
</div>

<?php 
    include_once('../footer.php');

    $cliente = new Cliente();
        
    if (isset($_POST['insertButton'])) {
        $cliente->setCpf($_POST["inputCpf"]);
        $cliente->setNomeCompleto($_POST["inputNome"]);
        $cliente->setEmail($_POST["inputEmail"]);
        $cliente->setLogradouro($_POST["inputLogradouro"]);
        $cliente->setNumero($_POST["inputNumero"]);
        $cliente->setBairro($_POST["inputBairro"]);
        $cliente->setComplemento($_POST["inputComplemento"]);
        $cliente->setCep($_POST["inputCep"]);
        $cliente->setCidade($_POST["inputCidade"]);
        $cliente->setEstado($_POST["inputEstado"]);
        $cliente->setCelular($_POST["inputCelular"]);
        $cliente->setObservacao($_POST["inputObservacao"]);
        $cliente->setStatusCliente(true);

        $cliente->insertCliente();
    }
?>