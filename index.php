<?php include_once "Layout/layoutHeader.php"; ?>
<?php 
  require "DbFactory.php";
  $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
  $Produtos = $db->Produto()->getTodos();

?>


<div class="conteiner conteiner-product col-md-12">
 <div class="row" style="display:flex;">



<?php foreach ($Produtos as $produto) { 
     $path = dirname(__FILE__).$produto->getFoto();
     $firstFile = scandir($path)[2];
     $firstFile = $produto->getFoto()."/".$firstFile;

     $price = $formatter->formatCurrency($produto->getEstoque()->getPreco(), 'BRL');

?>

    <div class="card-product col-md-3" data-product="<?php echo $produto->getId() ?>">
        <div class="card-content">
            <div class="main-image-product">
                <img src="<?php echo $firstFile;?>" alt="">
            </div>

            <div class="desc-product">
                <?php echo $produto->getNome(); ?>
            </div>

            <div class="price-product">
                <div class="main-price-product"><?php echo $price  ?></div>

                <?php 
                    $unavailable = false;
                    if(isset($_SESSION["SessionCart"])){
                        $cartArray = json_decode($_SESSION["SessionCart"]);
                        $idProduto = $produto->getId();

                        $fItem = array_filter(
                            $cartArray,
                            function ($e) use (&$idProduto) {
                                return $e->idProduto == (int)$idProduto;
                            }
                        );
                    
                        $count = count($fItem);
                        if($count > 0){
                            $item = reset($fItem);
                            if($item->qtd >= (int)$produto->getEstoque()->getQuantidade())
                                $unavailable = true;
                        }
                    }
                ?>

                <?php if($produto->getEstoque()->getQuantidade() <= 0 ||  $unavailable) {?>
                    <div class="product-unavailable">
                        Indispon??vel
                    </div>
                <?php } else { ?>
                    <div class="product-add-cart">
                        <i class="fas fa-cart-plus"></i> Adicionar
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


 <?php } ?>






    <!-- <div class="card-product col-md-3">
        <div class="card-content">
            <div class="main-image-product">
                <img src="./Uploads/2.jpg" alt="">
            </div>

            <div class="desc-product">
                Ultrabook Negativo KKK
            </div>

            <div class="price-product">
                <div class="main-price-product">R$ 67.999,99</div>
                <div class="main-price-obs">278x de R$9,99 c/juros</div>
            </div>

        </div>
    </div> -->

    <!-- <div class="card-product col-md-3">
        <div class="card-content">
            <div class="main-image-product">
                <img src="./Uploads/3.jpg" alt="">
            </div>

            <div class="desc-product">
               Burnout ParaRola Remastered
            </div>

            <div class="price-product">
                <div class="main-price-product">R$ 67.999,99</div>
                <div class="main-price-obs">278x de R$9,99 c/juros</div>
            </div>
        </div>
    </div> -->
<!-- 
    <div class="card-product col-md-3">
        <div class="card-content">
            <div class="main-image-product">
                <img src="./Uploads/3.jpg" alt="">
            </div>

            <div class="desc-product">
               Burnout ParaRola Remastered
            </div>

            <div class="price-product">
                <div class="main-price-product">R$ 67.999,99</div>
                <div class="main-price-obs">278x de R$9,99 c/juros</div>
            </div>

        </div>
    </div> -->

    <!-- <div class="card-product col-md-3">
        <div class="card-content">
            <div class="main-image-product">
                <img src="./Uploads/3.jpg" alt="">
            </div>

            <div class="desc-product">
               Burnout ParaRola Remastered
            </div>

            <div class="price-product">
                <div class="main-price-product">R$ 67.999,99</div>
                <div class="main-price-obs">278x de R$9,99 c/juros</div>
            </div>

        </div>
    </div> -->


 </div>











 



</div>




<?php include_once "Layout/layoutFooter.php"; ?>
