<?php
$page_title = "Cadastro de Fornecedores";

include_once("./Layout/layoutHeader.php");
include_once("authentication.php");

?>


<body>

    <div class="row">
        <div class="col justify-content-center  m-4 ">

            <div class="row justify-content-md-center">
                <h2 class="primary-color m-3"> Cadastro de Fornecedor</h2>
            </div>

            <div class="row justify-content-md-center">

                <div class="col-md-7">


                    <form action="supplierCreate.php" method="POST">

                        <div class="mb-3">
                            <label for="inputSupplierName" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="inputSupplierName" name="inputSupplierName" placeholder="Ex. João das Neves " required>
                        </div>

                        <div class="mb-3">
                            <label for="inputSupplierPhone" class="form-label">Telefone:</label>
                            <input type="number" class="form-control" id="inputSupplierPhone" name="inputSupplierPhone" placeholder="Ex. (54) 9 9712-1491" required>
                        </div>

                        <div class="mb-3">
                            <label for="inputSupplierMail" class="form-label">E-mail:</label>
                            <input type="email" class="form-control" id="inputSupplierMail" name="inputSupplierMail" placeholder="Ex. joaodasilva@gmail.com" required>
                        </div>

                        <div class="mb-3">
                            <label for="inputSupplierDescription" class="form-label">Descrição:</label>
                            <textarea type="textarea" class="form-control" id="inputSupplierDescription" name="inputSupplierDescription" rows="5" cols="53" maxlength="100" required></textarea>
                        </div>


                        <div class="row justify-content-md-center">
                            <h2 class="primary-color m-3"> Dados do endereço</h2>
                        </div>


                        <div class="mb-3">
                            <label for="inputSupplierStreet" class="form-label">Rua:</label>
                            <input type="text" class="form-control" id="inputSupplierStreet" name="inputSupplierStreet" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="inputSupplierNumber" class="form-label">Numero:</label>
                            <input type="number" class="form-control" id="inputSupplierNumber" name="inputSupplierNumber" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="inputSupplierComplement" class="form-label"> Complemento:</label>
                            <input type="text" class="form-control" id="inputSupplierComplement" name="inputSupplierComplement" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="inputSupplierDistrict" class="form-label">Bairro:</label>
                            <input type="text" class="form-control" id="inputSupplierDistrict" name="inputSupplierDistrict" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="inputSupplierCep" class="form-label">Cep:</label>
                            <input type="number" class="form-control" id="inputSupplierCep" name="inputSupplierCep" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="inputSupplierCity" class="form-label">Cidade:</label>
                            <input type="text" class="form-control" id="inputSupplierCity" name="inputSupplierCity" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="inputSupplierState" class="form-label">Estado:</label>
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

    </div>


</body>