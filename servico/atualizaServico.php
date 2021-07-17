<?php 
    include_once('../header.php');
    require '../classes/Cliente.php';
    require '../classes/Servidor.php';
    require '../classes/Servico.php';

    $servicoClass = new Servico();
    $servicoClass->setId($_GET["id"]);

    $servico = $servicoClass->selectById();

?>

<!-- nome completo, CPF, endereço (logradouro, número, bairro, complemento, CEP, cidade e estado), e-mail, celular -->
<div class="container mt-5">
    <form class="form row g-3" action="" method="post">
    <div class="col-md-4">
            <label for="selectCliente" class="form-label">Cliente</label>
            <input type="text" class="form-control" id="inputCliente" name="inputCliente" value="<?php echo $servico[0]["cpf_cliente"] ?>" required disabled>           
        </div>
        <div class="col-md-4">
            <label for="selectServidor" class="form-label">Servidor</label>
            <input type="text" class="form-control" id="inputServidor" name="inputServidor" value="<?php echo $servico[0]["cpf_servidor"] ?>" required disabled>
        </div>
        <div class="col-md-2">
            <label for="inputInicioDt" class="form-label">Data de Inicio</label>
            <input type="date" class="form-control" id="inputInicioDt" name="inputInicioDt" value="<?php echo $servico[0]["dtInicio"] ?>">
        </div>
        <div class="col-md-2">
            <label for="inputFinalDt" class="form-label">Data Final</label>
            <input type="date" class="form-control" id="inputFinalDt" name="inputFinalDt" value="<?php echo $servico[0]["dtFinal"] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputServico" class="form-label">Tipo de Serviço</label>
            <input type="text" class="form-control" id="inputServico" name="inputServico" value="<?php echo $servico[0]["tipo_servico"] ?>" >
        </div>
        <div class="col-md-2">
            <label for="inputPreco" class="form-label">Preço Total</label>
            <input type="number" min="1" step="any" class="form-control" id="inputPreco" name="inputPreco" value="<?php echo $servico[0]["preco_total"] ?>">
        </div>
        <div class="col-md-2">
            <label for="selectCategoria" class="form-label">Categoria do Serviço</label>            
            <select class="form-select" name="selectCategoria" id="selectCategoria" aria-label="Selecione uma categoria">
                    <optgroup label="Categoria Selecionada">
                        <option value="<?php echo $servico[0]["categoria_servico"] ?>" selected><?php echo $servico[0]["categoria_servico"] ?> Horas</option>
                    </optgroup>
                    <optgroup label="Outras categorias">
                        <option class="selectCategoria" value="2">2 Horas</option>
                        <option class="selectCategoria" value="4">4 Horas</option>
                        <option class="selectCategoria" value="6">6 Horas</option>
                        <option class="selectCategoria" value="8">8 Horas</option>
                    </optgroup>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="updateButton">Atualizar</button>
        </div>
    </form>
</div>

<?php 
    include_once('../footer.php');

    $servico1 = new Servico();
        
    if (isset($_POST['updateButton'])) {
        $servico1->setId($_GET["id"]);
        $servico1->setDtInicio($_POST["inputInicioDt"]);
        $servico1->setDtFinal($_POST["inputFinalDt"]);
        $servico1->setTipoServico($_POST["inputServico"]);
        $servico1->setPreco($_POST["inputPreco"]);
        $servico1->setCategoriaServico($_POST["selectCategoria"]);

        $servico1->updateServico();

    }
?>