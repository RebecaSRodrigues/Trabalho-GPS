<?php 
include_once('../header.php');
?>
<!-- nome completo, CPF, endereço (logradouro, número, bairro, complemento, CEP, cidade e estado), e-mail, celular -->
<div class="container mt-5">
    <form class="row g-3">
        <div class="col-md-6">
            <label for="inputNome" class="form-label">Nome completo</label>
            <input type="text" class="form-control" id="inputNome">
        </div>
        <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail">
        </div>
        <div class="col-6">
            <label for="inputLogradouro" class="form-label">Logradouro</label>
            <input type="text" class="form-control" id="inputLogradouro">
        </div>
        <div class="col-1">
            <label for="inputNumeroEndereco" class="form-label">Número</label>
            <input type="text" class="form-control" id="inputNumeroEndereco">
        </div>
        <div class="col-2">
            <label for="inputCep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="inputCep">
        </div>
        <div class="col-2">
            <label for="inputCep" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="inputCep">
        </div>
        <div class="col-md-2">
            <label for="inputCidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="inputCidade">
        </div>
        <div class="col-md-2">
            <label for="inputEstado" class="form-label">Estado</label>
            <select id="inputEstado" class="form-select">
            <option selected>Escolha seu estado...</option>
            <option>...</option>
            </select>
        </div>
        <div class="col-md-5">
            <label for="inputComplemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="inputComplemento">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>
<?php 
include_once('../footer.php');
?>