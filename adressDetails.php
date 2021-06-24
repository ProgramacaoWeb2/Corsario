<?php
include_once("./DbFactory.php");

$supplierId = @$_POST['supplierId'];
$supplier = $db->Fornecedor()->getPorCodigo($supplierId);

$adress =  $db->Endereco()->getPorCodigo($supplier->getIdEndereco());

?>

<td colspan="7">
    <div>
        <table class="col-md-12">
            <tr>
                <th scope="col" class="color-purple">Rua</th>
                <th scope="col" class="color-purple">Número</th>
                <th scope="col" class="color-purple">Complemento</th>
                <th scope="col" class="color-purple">Bairro</th>
                <th scope="col" class="color-purple">CEP</th>
                <th scope="col" class="color-purple">Cidade</th>
                <th scope="col" class="color-purple">Estado</th>
                <th>
            </tr>
            <tr>
                <td>
                    <?php echo $adress->getRua(); ?>
                </td>

                <td>
                    <?php echo $adress->getNumero(); ?>
                </td>

                <td>
                    <?php echo $adress->getComplemento(); ?>
                </td>

                <td>
                    <?php echo $adress->getBairro();  ?>
                </td>

                <td>
                    <?php echo $adress->getCep();  ?>
                </td>

                <td>
                    <?php echo $adress->getCidade();  ?>
                </td>

                <td>
                    <?php echo $adress->getEstado();  ?>
                </td>

            </tr>

        </table>
    </div>
</td>