<?php
$page_title = "Fornecedores";

include_once("Layout/layoutHeader.php");
include_once('DbFactory.php');

?>


<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="page-title">
        <span>Lista de Fornecedores</span>
    </div>


    <div class="search-panel">

        <form action="supplierSingle.php" method="get">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <label for="idInput"># </label>
                    <input type="number" class="form-control form-control-sm" id="idInput" aria-describedby="idInput" name="idInput" placeholder="Ex: 1">
                </div>

                <div class="col-md-3 col-sm-4">
                    <label for="nameInput">Nome </label>
                    <input type="text" class="form-control form-control-sm" id="nameInput" aria-describedby="nameInput" name="nameInput" placeholder="Ex: AquiExpress">
                </div>


                <div class="col-md-12">
                    <button type="submit" class="btn btn-purple mb-2 btn-sm" id="btn-user-search">Pesquisar</button>
                </div>

                <div class="col-md-12">
                    <a class="btn btn-purple mb-2 btn-sm" href="/supplierPage.php"> Criar Fornecedor</a>
                </div>


            </div>



        </form>

    </div>



    <div id="dynamicContentSupplier">

    </div>

</div>

<script>
    $(document).ready(function() {
        load_data(1);

        function load_data(page, query = '') {

            $.ajax({
                url: "supplierListPartialPagination.php",
                method: "POST",
                data: {
                    page: page,
                    query: query
                },
                success: function(data) {
                    $('#dynamicContentSupplier').html(data);
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