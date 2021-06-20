<?php include_once "Layout/layoutHeader.php"; ?>

<?php 
  require "DbFactory.php";
  $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
  $idProduto = @$_GET["idProduto"];
  $produto = $db->Produto()->getPorCodigo($idProduto);

  $path = dirname(__FILE__).$produto->getFoto();

  $imagesArray = array_diff(scandir($path), array('.', '..')); 
  $price = $formatter->formatCurrency($produto->getEstoque()->getPreco(), 'BRL');
?>

<div class="conteiner col-md-12 col-lg-12 col-sm-12 col-xs-12 " style="margin: 3rem 0;">
    <div class="row">

    <div class="col-md-9">
        <div class="row">
            <div class="col-md-6">
            <div id="carouselProduct" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <?php 
                $count = 0;
                $active = "active";
                foreach ($imagesArray as $i) { 
                    if( $count > 0)
                        $active = "";
                ?>
                     <li data-target="#carouselProduct" data-slide-to="<?php echo $count; ?>" class="<?php echo $active; ?>"></li>
                <?php  $count++; } ?>
                </ol>
                <div class="carousel-inner">

                    <?php 
                    $count = 0;
                    $active = "active";
                    foreach ($imagesArray as $image){ 
                        if( $count > 0)
                            $active = "";
                    ?>

                        <div class="carousel-item <?php echo $active; ?>">
                             <img class="d-block w-100" src="<?php echo ".".$produto->getFoto()."/".$image; ?>">
                        </div>

                    <?php  $count++; } ?>
                    

                </div>
                <a class="carousel-control-prev" href="#carouselProduct" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselProduct" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>
    
            <div class="col-md-6">
                <div id="product-name">
                    <?php echo $produto->getNome(); ?>
                </div>
                <div id="product-id">
                    <?php echo "#".$produto->getId(); ?>
                </div>
                <div id="product-desc">
                    <?php echo $produto->getDescricao(); ?>
                </div>
            
            </div>

        </div>
    </div>


    <div class="col-md-3 card-product price-product" data-product="<?php echo $produto->getId(); ?>">
        <div id="product-price">
            <?php echo $price;  ?>
        </div>

        <div class="price-product">
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
                        Indisponível
                    </div>
                <?php } else { ?>
                    <div class="product-add-cart">
                        <i class="fas fa-cart-plus"></i> Adicionar
                    </div>
                <?php } ?>

                </div>
                
        
    </div>





    </div>
</div>









<?php include_once "Layout/layoutFooter.php"; ?>