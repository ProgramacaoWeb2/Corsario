<?php
$page_title = "Cadastro de Fornecedores";

include_once("./Layout/layoutHeader.php");
include "authentication.php";
?>


<body>

    <div id="loginbBody">

        <span id="title">Cadastro de fornecedor</span>

        <div id="loginContent">
            <div class="formArea">

                <form action="supplierCreate.php" method="POST">

                    <div class="formGroup">
                        <label for="inputSupplierName">Nome:</label>
                        <input type="text" id="inputSupplierName" name="inputSupplierName" placeholder="Ex. João das Neves " required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierPhone">Telefone:</label>
                        <input type="number" id="inputSupplierPhone" name="inputSupplierPhone" placeholder="Ex. (54) 9 9712-1491" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierMail">E-mail:</label>
                        <input type="email" id="inputSupplierMail" name="inputSupplierMail" placeholder="Ex. joaodasilva@gmail.com" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierDescription">Descrição:</label>
                        <textarea type="textarea" id="inputSupplierDescription" name="inputSupplierDescription" rows="5" cols="53" maxlength="100" required></textarea>
                    </div>


                    <span>Dados do endereço</span>

                    <div class="formGroup">
                        <label for="inputSupplierStreet">Rua:</label>
                        <input type="text" id="inputSupplierStreet" name="inputSupplierStreet" placeholder="" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierNumber">Numero:</label>
                        <input type="number" id="inputSupplierNumber" name="inputSupplierNumber" placeholder="" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierComplement">Complemento:</label>
                        <input type="text" id="inputSupplierComplement" name="inputSupplierComplement" placeholder="" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierDistrict">Bairro:</label>
                        <input type="text" id="inputSupplierDistrict" name="inputSupplierDistrict" placeholder="" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierCep">Cep:</label>
                        <input type="number" id="inputSupplierCep" name="inputSupplierCep" placeholder="" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierCity">Cidade:</label>
                        <input type="text" id="inputSupplierCity" name="inputSupplierCity" placeholder="" required>
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


                    <button class="corsBtn btn-purple" type="submit">Cadastrar</button>


                </form>
            </div>

        </div>



    </div>
</body>