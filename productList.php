<?php
include_once("./DbFactory.php");

$productId = @$_POST['productId'];
$formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
$product = $db->Produto()->getPorCodigo($productId);
$supplier = $db->Fornecedor()->getPorCodigo($product->getIdFornecedor());
$stock = $db->Estoque()->pesquisaProdutoPorId($product->getId());

?>

<td colspan="7">
    <div>
        <table class="col-md-12">
            <tr>
                <th scope="col" class="color-purple">Nome Fornecedor</th>
                <th scope="col" class="color-purple">Descrição Fornecedor</th>
                <th scope="col" class="color-purple">Quantidade em Estoque</th>
                <th scope="col" class="color-purple">Valor Unitário</th>
                <th>
            </tr>
            <tr>
                <td>
                    <?php echo $supplier->getNome(); ?>
                </td>

                <td>
                    <?php echo $supplier->getDescricao(); ?>
                </td>

                <td>
                    <?php echo $stock->getQuantidade(); ?>
                </td>

                <td>
                    <?php echo $formatter->formatCurrency($stock->getPreco(), 'BRL');  ?>
                </td>

            </tr>

        </table>
    </div>
</td>