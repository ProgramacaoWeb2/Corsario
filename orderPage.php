<?php
$page_title = "Cadastro de pedidos";

include_once("Layout/layoutHeader.php");
include_once("authentication.php");
include_once("DbFactory.php");

$users = $db->Usuario()->getTodos(NULL);
?>



<body>

    <div id="loginbBody">

        <span class="mb-3">Cadastro de pedido</span>

        <div id="loginContent">
            <div class="formArea">

                <form>

                    <div class="form-group">
                        <label for="inputOrderNumber">Numero:</label>
                        <input class="form-control" type="number" id="inputOrderNumber" name="inputOrderNumber" placeholder="Ex. Gphone " required>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-6 mb-3">
                            <label for="date" class="col-form-label">Data de nascimento</label>
                            <input class="form-control" type="date" value="2020-12-02" id="date" required>
                            <small class="form-text text-muted">Obrigatório</small>
                        </div>

                    </div>



                    <div class="form-check">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Novo</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">2</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled>
                            <label class="form-check-label" for="inlineRadio3">3 </label>
                        </div>
                    </div>

                    <div class="form-group input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputOrderUser">Cliente</label>
                        </div>
                        <select class="custom-select" id="inputOrderUser" name="inputOrderUser" required>
                            <?php
                            foreach ($users as $user) { ?>
                                <option value=<?= $user->getId() ?>><?= $user->getName() ?></option>
                            <?php  } ?>
                        </select>
                    </div>


                    <button class="corsBtn btn-purple" id="btn-create-order" type="submit">Cadastrar</button>


                    <form>

            </div>

        </div>


    </div>



</body>