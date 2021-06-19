<?php include_once "Layout/layoutHeader.php"; ?>


<?php if(!isset( $_SESSION["SessionCart"])) { ?>

    <div class="conteiner col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin: 3rem 0;text-align: center;display: flex;">
        <div class="row" style="margin: auto;">
            Seu carrinho está vazio.
        </div>
    </div>

<?php } else { 
    require "DbFactory.php";
    $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
    $cartArray = json_decode($_SESSION["SessionCart"]);

    $productArray = array_map(function($item){
        return $item->idProduto;
    },  $cartArray );

    $Produtos = $db->Produto()->getByList($productArray);

?>

<div class="conteiner col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin: 3rem 0;">
    <div class="row">

    <div class="col-md-9">
        <table id="cart-table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Qtd.</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            $totalSum = 0;
            foreach ($Produtos as $produto) { 
                $path = dirname(__FILE__).$produto->getFoto();
                $firstFile = scandir($path)[2];
                $firstFile = $produto->getFoto()."/".$firstFile;
           
                $price = $formatter->formatCurrency($produto->getEstoque()->getPreco(), 'BRL');

                $idProduto = $produto->getId();
                $sessionItem = array_filter(
                    $cartArray,
                    function ($e) use (&$idProduto) {
                        return $e->idProduto == (int)$idProduto;
                    }
                );

                $sessionItem = reset( $sessionItem );
                $totalSum += ((int)$sessionItem->qtd) * (double)$produto->getEstoque()->getPreco();

            ?>
                <tr class="product-cart-list">
                    <td> 
                        <div class="product-cart-desc">

                            <div class="product-cart-image">
                                <img class="d-block w-100"  src="<?php echo $firstFile;?>" alt="">
                            </div>
                            <div class="product-cart-name">
                                <?php echo $produto->getNome(); ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-qtd">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control input-qtd-cart" min="1" max="<?php echo $produto->getEstoque()->getQuantidade(); ?>" value="<?php echo $sessionItem->qtd; ?>" data-product="<?php echo $produto->getId(); ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="DeleteItemCart(<?php echo $idProduto;  ?>)"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                          
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-price">
                            <span> <?php echo $price;  ?> </span>
                           
                        </div>
                    </td>
                </tr>

            <?php } ?>

                
            </tbody>
        </table>
      
    </div>


    <div class="col-md-3">
        <div id="product-price">
            <?php echo $formatter->formatCurrency($totalSum , 'BRL'); ?> 
        </div>

        <?php if(isset($_SESSION["idUsuario"])){ ?>
            <div class="btn-buy" id="btn-buy-logged">
                <i class="fas fa-shopping-cart"></i> Finalizar Compra
            </div>
        <?php } else{  ?>
            <div class="btn-buy" id="btn-buy-unlogged">
                <i class="fas fa-shopping-cart"></i> Finalizar Compra
            </div>

        <?php } ?>
    </div>





    </div>
</div>


<?php } ?>






<?php include_once "Layout/layoutFooter.php"; ?>