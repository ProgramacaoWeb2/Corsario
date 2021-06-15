<?php include_once "Layout/layoutHeader.php"; ?>

<style>
    .product-cart-desc{
        display: flex;
    }

    .product-cart-image{
        width: 30%;
    }

    .product-cart-name{
        font-size: 15px;
        width: 70%;
        max-width: 40rem;
    }

    @media only screen and (max-width: 600px) {
        .product-cart-desc{
            display: block;
        }

        .product-cart-image{
            width: 100%;
        }

        .product-cart-name{
            width: 100%;
        }
    }

    .product-cart-qtd{
        display: flex;
        width: 8rem;
    }

    .product-cart-qtd .input-group {
        width: 7rem;
        margin: auto;
    }

    .product-cart-qtd .input-group button {
        background-color: #6775d8 !important;
        color: #fff !important;
    }

    .product-cart-price{
        display: flex;
    }

    .product-cart-price span{
       margin: auto;
    }

  


</style>

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
                <tr>
                    <td> 
                        <div class="product-cart-desc">

                            <div class="product-cart-image">
                                <img class="d-block w-100" src="./Uploads/1.jpg">
                            </div>
                            <div class="product-cart-name">
                                Produto muito pica pqp seloco produto muito bom se não acredita compra ae sério pq negócio muito bom seloco mano bagulho é pica, compra ae e cala a boca.
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-qtd">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">-</button>
                                </div>
                                <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">+</button>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-price">
                            <span> R$ 00,77 </span>
                           
                        </div>
                    </td>
                </tr>

                <tr>
                    <td> 
                        <div class="product-cart-desc">

                            <div class="product-cart-image">
                                <img class="d-block w-100" src="./Uploads/1.jpg">
                            </div>
                            <div class="product-cart-name">
                                Produto muito pica pqp seloco produto muito bom se não acredita compra ae sério pq negócio muito bom seloco mano bagulho é pica, compra ae e cala a boca.
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-qtd">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">-</button>
                                </div>
                                <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">+</button>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>00,77</td>
                </tr>

                <tr>
                    <td> 
                        <div class="product-cart-desc">

                            <div class="product-cart-image">
                                <img class="d-block w-100" src="./Uploads/1.jpg">
                            </div>
                            <div class="product-cart-name">
                                Produto muito pica pqp seloco produto muito bom se não acredita compra ae sério pq negócio muito bom seloco mano bagulho é pica, compra ae e cala a boca.
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-qtd">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">-</button>
                                </div>
                                <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">+</button>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>00,77</td>
                </tr>
                
            </tbody>
        </table>
      
    </div>


    <div class="col-md-3">
        <div id="product-price">
            R$ 570,00
        </div>

        <div id="btn-buy">
            <i class="fas fa-shopping-cart"></i> Comprar
        </div>
    </div>





    </div>
</div>









<?php include_once "Layout/layoutFooter.php"; ?>