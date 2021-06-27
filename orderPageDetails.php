<?php
$page_title = "Fornecedores";

include_once("Layout/layoutHeader.php");
include_once('DbFactory.php');

?>


<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="page-title">
        <span>Lista de Pedidos</span>
    </div>


    <div class="search-panel">

        <div id="order-main">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <label for="idInput">Número do Pedido </label>
                    <input type="number" class="form-control form-control-sm" id="idInput" aria-describedby="idInput" name="idInput" placeholder="Ex: 1">
                </div>

                <!-- <div class="col-md-3 col-sm-4">
                    <label for="numeroInput">Número do Pedido </label>
                    <input type="text" class="form-control form-control-sm" id="numeroInput" aria-describedby="numeroInput" name="numeroInput" placeholder="Ex: 1">
                </div> -->

                <?php if(isset($_SESSION["userType"]) && $_SESSION["userType"] == 1){ ?>
                    <div class="col-md-3 col-sm-4">
                        <label for="orderNameInput">Nome do Cliente </label>
                        <input type="text" class="form-control form-control-sm" id="orderNameInput" aria-describedby="orderNameInput" name="orderNameInput" placeholder="Ex: Urubu">
                    </div>
                <?php } else{ ?>
                    <input type="hidden" class="form-control form-control-sm" id="orderNameInput" aria-describedby="orderNameInput" name="orderNameInput" placeholder="Ex: Urubu">
                <?php } ?>


                <div class="col-md-12">
                    <button type="submit" class="btn btn-purple mb-2 btn-sm" id="btn-order-search" >Pesquisar</button>
                </div>

                <!-- <div class="col-md-12">
                    <a class="btn btn-purple mb-2 btn-sm" href="index.php"> Criar Pedido</a>
                </div> -->


            </div>




        </div>



    </div>


   <div id="dynamicContentOrders">
   
   </div> 

</div>

<script>
    $(document).ready(function() {
        load_data(1);

        function load_data(page, query ='') {

            $.ajax({
                url: "orderDetailsPagination.php",
                method: "POST",
                data: {
                    page: page,
                    query: query
                },
                success: function(data) {
                    $('#dynamicContentOrders').html(data);
                }
            });
        }

        $(document).on('click', '.page-link', function() {
            var page = $(this).data('page_number');
            var query = $('#search_box').val();
            load_data(page, query);
        });
    });
</script>