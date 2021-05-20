<?php 
    include_once('../header.php');
    require '../classes/Servidor.php';

    $servidorClass = new Servidor();
    $servidorClass->setId($_GET["id"]);

    $servidor = $servidorClass->selectById()
?>

<!-- nome completo, CPF, endereço (logradouro, número, bairro, complemento, CEP, cidade e estado), e-mail, celular -->
<div class="container mt-5">
    <form class="form row g-3" action="" method="post">
        <div class="col-md-6">
            <label for="inputCpf" class="form-label">Cpf</label>
            <input type="text" class="form-control" id="inputCpf" name="inputCpf" value="<?php echo $servidor[0]["cpf"] ?>" required disabled>
        </div>
        <div class="col-md-6">
            <label for="inputNome" class="form-label">Nome completo</label>
            <input type="text" class="form-control" id="inputNome" name="inputNome" value="<?php echo $servidor[0]["nomeCompleto"] ?>" required>
        </div>
        <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $servidor[0]["email"] ?>" required>
        </div>
        <div class="col-6">
            <label for="inputLogradouro" class="form-label">Logradouro</label>
            <input type="text" class="form-control" id="inputLogradouro" name="inputLogradouro" value="<?php echo $servidor[0]["logradouro"] ?>" required>
        </div>
        <div class="col-1">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="number" class="form-control" id="inputNumero" name="inputNumero" value="<?php echo $servidor[0]["numero"] ?>" required>
        </div>
        <div class="col-2">
            <label for="inputBairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="inputBairro" name="inputBairro" value="<?php echo $servidor[0]["bairro"] ?>" required>
        </div>
        <div class="col-2">
            <label for="inputComplemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="inputComplemento" name="inputComplemento" value="<?php echo $servidor[0]["complemento"] ?>" required>
        </div>
        <div class="col-2">
            <label for="inputCep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="inputCep" name="inputCep" value="<?php echo $servidor[0]["cep"] ?>" required>
        </div>
        <div class="col-md-2">
            <label for="inputCidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="inputCidade" name="inputCidade" value="<?php echo $servidor[0]["cidade"] ?>" required>
        </div>
        <div class="col-md-2">
            <label for="inputEstado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="inputEstado" name="inputEstado" value="<?php echo $servidor[0]["estado"] ?>" required>
        </div>
        <div class="col-md-5">
            <label for="inputCelular" class="form-label">Celular</label>
            <input type="text" class="form-control" id="inputCelular" name="inputCelular" value="<?php echo $servidor[0]["celular"] ?>" required>
        </div>
        <div class="col-md-5">
            <label for="inputObservacao" class="form-label">Observacao</label>
            <input type="text" class="form-control" id="inputObservacao" name="inputObservacao" value="<?php echo $servidor[0]["observacao"] ?>" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="updateButton">Cadastrar</button>
        </div>
    </form>
</div>

<?php 
    include_once('../footer.php');

    $servidor1 = new Servidor();
        
    if (isset($_POST['updateButton'])) {
        $servidor1->setId($_GET["id"]);
        $servidor1->setNomeCompleto($_POST["inputNome"]);
        $servidor1->setEmail($_POST["inputEmail"]);
        $servidor1->setLogradouro($_POST["inputLogradouro"]);
        $servidor1->setNumero($_POST["inputNumero"]);
        $servidor1->setBairro($_POST["inputBairro"]);
        $servidor1->setComplemento($_POST["inputComplemento"]);
        $servidor1->setCep($_POST["inputCep"]);
        $servidor1->setCidade($_POST["inputCidade"]);
        $servidor1->setEstado($_POST["inputEstado"]);
        $servidor1->setCelular($_POST["inputCelular"]);
        $servidor1->setObservacao($_POST["inputObservacao"]);
        $servidor1->setStatusServidor(true);

        $servidor1->updateServidor();

    }
?>