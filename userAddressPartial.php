
<?php 
    include_once('./DbFactory.php');
    $id = null;
    if(isset($idEndereco))
        $id = $idEndereco;

    $address = new Endereco(null,null,null,null,null,null,null,null);

    if($id != null)
        $address = $db->Endereco()->getPorCodigo($id);


?>

<span>Dados do endereço</span>

<div class="formGroup">
    <label for="inputAddressStreet">Rua:</label>
    <input type="text" id="inputAddressStreet" name="inputAddressStreet" placeholder="" value="<?php echo($address->getRua()) ?>">
</div>

<div class="formGroup">
    <label for="inputAddressNumber">Numero:</label>
    <input type="number" id="inputAddressNumber" name="inputAddressNumber" placeholder=""  value="<?php echo($address->getNumero()) ?>">
</div>

<div class="formGroup">
    <label for="inputAddressComplement">Complemento:</label>
    <input type="text" id="inputAddressComplement" name="inputAddressComplement" placeholder="" value="<?php echo($address->getComplemento()) ?>">
</div>

<div class="formGroup">
    <label for="inputAddressDistrict">Bairro:</label>
    <input type="text" id="inputAddressDistrict" name="inputAddressDistrict" placeholder="" value="<?php echo($address->getBairro()) ?>">
</div>

<div class="formGroup">
    <label for="inputAddressCep">Cep:</label>
    <input type="number" id="inputAddressCep" name="inputAddressCep" placeholder="" value="<?php echo($address->getCep()) ?>">
</div>

<div class="formGroup">
    <label for="inputAddressCity">Cidade:</label>
    <input type="text" id="inputAddressCity" name="inputAddressCity" placeholder="" value="<?php echo($address->getCidade()) ?>">
</div>

<div class="formGroup">
    <label for="inputAddressState">Estado:</label>
    
    <select name="inputAddressState" id="inputAddressState" class="form-control">
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