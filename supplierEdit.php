<?php

$page_title = "Editar Fornecedor";

include_once('Layout/layoutHeader.php');
include_once('DbFactory.php');

$supplierDb = $db->Fornecedor();


$name = @$_GET['name'];
$id = @$_GET['id'];

if ($name === NULL) {
    $supplier = $supplierDb->getPorCodigo($id);
} else {
    $supplier = $supplierDb->getPorNome($name);
}


$adress = $db->Endereco()->getPorCodigo($supplier->getIdEndereco());

?>

<body>

    <div id="loginbBody">

        <span id="title">Editar fornecedor</span>

        <div id="loginContent">
            <div class="formArea">

                <form action="supplierCreate.php" method="POST">

                    <div class="formGroup">
                        <label for="inputSupplierId">Identificação:</label>
                        <input type="text" readonly="readonly" value="<?= $supplier->getId() ?>" id="inputSupplierId" name="inputSupplierId" placeholder="Ex. João das Neves ">
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierName">Nome:</label>
                        <input type="text" value="<?= $supplier->getNome() ?>" id="inputSupplierName" name="inputSupplierName" placeholder="Ex. João das Neves ">
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierPhone">Telefone:</label>
                        <input type="number" value="<?= $supplier->getTelefone() ?>" id="inputSupplierPhone" name="inputSupplierPhone" placeholder="Ex. joaodasilva@gmail.com">
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierMail">E-mail:</label>
                        <input type="email" value="<?= $supplier->getEmail() ?>" id="inputSupplierMail" name="inputSupplierMail" placeholder="Ex. joaodasilva@gmail.com">
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierDescription">Descrição:</label>
                        <textarea type="textarea" id="inputSupplierDescription" name="inputSupplierDescription" rows="5" cols="53" maxlength="100"><?= $supplier->getDescricao() ?></textarea>
                    </div>


                    <span>Dados do endereço</span>

                    <div class="formGroup">
                        <label for="inputSupplierStreet">Rua:</label>
                        <input type="text" id="inputSupplierStreet" name="inputSupplierStreet" value="<?= $adress->getRua() ?>" placeholder="" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierNumber">Numero:</label>
                        <input type="number" id="inputSupplierNumber" name="inputSupplierNumber" value="<?= $adress->getNumero() ?>" placeholder="" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierComplement">Complemento:</label>
                        <input type="text" id="inputSupplierComplement" name="inputSupplierComplement" value="<?= $adress->getComplemento() ?>" placeholder="" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierDistrict">Bairro:</label>
                        <input type="text" id="inputSupplierDistrict" name="inputSupplierDistrict" value="<?= $adress->getEstado()?>" placeholder="" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierCep">Cep:</label>
                        <input type="number" id="inputSupplierCep" name="inputSupplierCep" value="<?= $adress->getCep() ?>" placeholder="" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierCity">Cidade:</label>
                        <input type="text" id="inputSupplierCity" name="inputSupplierCity" value="<?= $adress->getCidade() ?>" placeholder="" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierState">Estado:</label>
                        <select name="inputSupplierState" id="inputSupplierState" class="form-control" required>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>


                    </div>


                    <button class="corsBtn btn-purple" type="submit">Editar</button>


                </form>
            </div>

        </div>