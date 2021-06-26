
$(() => {




    $('.nav-link-cart').on('click', () => {
        if ($('#cart-option').is(':visible'))
            $('#cart-option').hide();
        else
            $('#cart-option').show();

    });

    $('#appBody').on('click', '#btn-order-details2', () => {

        let orderId = $('#btn-order-details2').text();

        console.log(orderId);

        $.post('/orderListPartialDetails.php', { orderId: orderId }, function (data) {

            $('#display-orders').html(data);

        }, 'html');

    });


    $('#appBody').on('click', '#btn-create-product', () => {
        return CreateProduct();
    });

    $('#appBody').on('click', '.adress-row', (elem) => {
        if ($(elem.target).hasClass('btn-group')) {
            return;
        }

        let tr = $(elem.target).closest("tr");
        let data = $(tr).data("adress");
        let details = `.adress-details-${data}`;


        if ($(details).is(':visible')) {
            $(details).hide();

        } else {
            $(details).load("/adressDetails.php", { supplierId: data });
            $(details).show();
        }

    });

    $('#appBody').on('click', '.order-row', (elem) => {
        if ($(elem.target).hasClass('btn-group')) {
            return;
        }

        let tr = $(elem.target).closest("tr");
        let data = $(tr).data("order");
        let details = `.order-details-${data}`;

        if ($(details).is(':visible')) {
            $(details).hide();

        } else {
            $(details).load("/orderDetailsPartial.php", { orderId: data });
            $(details).show();
        }

    });

    $('#appBody').on('click', '.product-row', (elem) => {
        if ($(elem.target).hasClass('btn-group')) {
            return;
        }

        let tr = $(elem.target).closest("tr");
        let data = $(tr).data("product");
        let details = `.product-details-${data}`;

        if ($(details).is(':visible')) {
            $(details).hide();

        } else {
            $(details).load("/productList.php", { productId: data });
            $(details).show();
        }

    });

    $('#appBody').on('click', '#btn-edit-product', () => {
        //return EditProduct();
    });

    $('#appBody').on('click', '#btn-delete-product', () => {
        //return DeleteProduct();
    });

    $('#appBody').on('click', '#btn-order-search', () => {
        return SearchOrder();
    });


    $('#appBody').on('click', '#btn-create-user', () => {
        return CreateUser();
    });

    $('#appBody').on('click', '#btn-edit-user', () => {
        return EditUser();
    });


    $('#appBody').on('click', '.btn-delete-user', (elem) => {
        let idUsuario = $(elem.target).data('user');
        return DeleteUser(idUsuario);
    });

    $('#appBody').on('click', '#btn-new-password', () => {
        return UpdatePassword();
    });


    $('#appBody').on('click', '#btn-user-search', () => {
        return SearchUser();
    });


    $('#appBody').on('click', '#btn-execute-login', () => {
        return ExecLogin();
    });

    $('#appBody').on('change', '#inputTypeUser', () => {
        let value = $('#inputTypeUser').val();

        if (value == 0)
            $('#address-form').show();
        else
            $('#address-form').hide();


    });


    $('#appBody').on('click', '.product-add-cart', (elem) => {
        var idProduto = $(elem.target).closest('.card-product').data('product');
        AddToCart(idProduto);

    });


    $('#appBody').on('keyup', '.input-qtd-cart', (elem) => {
        var value = parseInt($(elem.target).val());
        var maxValue = parseInt($(elem.target).attr('max'));

        if (value > maxValue) {
            $(elem.target).val(maxValue);
        }
        else if (value <= 0)
            $(elem.target).val(1);
    });

    $('#appBody').on('chance', '.input-qtd-cart', (elem) => {
        var value = parseInt($(elem.target).val());
        var maxValue = parseInt($(elem.target).attr('max'));

        if (value > maxValue) {
            $(elem.target).val(maxValue);
        }
        else if (value <= 0)
            $(elem.target).val(1);
    });

    $('#appBody').on('focusout', '.input-qtd-cart', (elem) => {
        UpdateCart();
    });


    $('#appBody').on('click', '#btn-buy-logged', (elem) => {
        AddOrder(0);

    });

    $('#appBody').on('click', '#btn-buy-unlogged', (elem) => {
        AddOrder(1);

    });

    $('#appBody').on('click', '.card-product', (elem) => {
        if ($(elem.target).is('.product-add-cart') || $(elem.target).is('.product-unavailable')) {
            return;
        }
        else {
            var idProduto = $($(elem.target).closest('.card-product')).data('product');
            window.location = "/productInfo.php?idProduto=" + idProduto;
        }


    });


})

var SearchOrder = () => {

    let search = {};
    search.idPedido = $('#idInput').val();
    search.numeroPedido = $('#numeroInput').val();
    search.nomeCliente = $('#orderNameInput').val();

    $.post('/orderDetailsPagination.php', { search: search }, function (data) {

        $('#dynamicContentOrders').html(data);

    }, 'html');
}

var AddOrder = (option) => {
    switch (option) {
        case 0:
            window.location = '/confirmOrder.php';
            break;

        case 1:
            window.location = '/loginPage.php?returnUrl=/confirmOrder.php';
            break;

    }

}

var DeleteItemCart = (idProduto) => {
    bootbox.confirm({
        message: "Deseja deletar remover o produto do seu carrinho?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-purple'
            },
            cancel: {
                label: 'Não',
                className: 'btn-secondary'
            }
        },
        callback: function (result) {
            if (result) {
                $.getJSON('/deleteItemCart.php', { idProduto: idProduto }, function (data) {
                    if (data.status)
                        window.location.reload();
                    else
                        AlertMessage(data.status, data.message);
                });
            }
        }
    });

}

var UpdateCart = () => {
    var listItens = $('.input-qtd-cart').map(function (i, elem) {
        var idProduto = parseInt($(elem).data('product'));
        var qtd = parseInt($(elem).val());
        return { idProduto: idProduto, qtd: qtd };

    }).get();

    $.post('/updateCart.php', { listItens: listItens }, function (data) {
        if (data.status) {
            window.location.reload();
        }
        else
            AlertMessage(data.status, data.message);

    }, 'json');

}


var AddToCart = (idProduto) => {

    $.post('/addToCart.php', { idProduto: idProduto }, function (data) {
        if (data.status) {
            if (data.setUnavailable) {
                $(`.card-product.col-md-3[data-product="${idProduto}"] .product-add-cart`).remove();
                $(`.card-product.col-md-3[data-product="${idProduto}"] .price-product`).append('<div class="product-unavailable">Indisponível</div>');
            }

            $('#total-cart').html(data.qtd);
        }
        else
            AlertMessage(data.status, data.message);

    }, 'json');

}

var CreateProduct = () => {

    var inputProductPhoto = $('#inputProductPhoto').prop('files')[0];
    var inputProductName = $('#inputProductName').val();
    var inputProductDescription = $('#inputProductDescription').val();
    var inputPreco = $('#inputPreco').val();
    var inputEstoque = $('#inputEstoque').val();
    var inputSupplierId = $('#inputSupplierId').val();

    var data = new FormData();
    data.append('Arquivo', inputProductPhoto);
    data.append('inputProductName', inputProductName);
    data.append('inputProductDescription', inputProductDescription);
    data.append('inputPreco', inputPreco);
    data.append('inputEstoque', inputEstoque);
    data.append('inputSupplierId', inputSupplierId);

    $.ajax({
        url: '/productCreate.php',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        success: function (response) {
            location.href = "productPageDetails.php";
            console.log(response);
        },
        error: function (response) {
            location.href = "productPageDetails.php";
            console.log("error in insert the file " + response);
        }
    });



}


var EditProduct = () => {

    var inputProductId = $('#inputProductId').val();
    var inputProductName = $('#inputProductName').val();
    var inputProductDescription = $('#inputProductDescription').val();
    var inputProductPhoto = $('#inputProductPhoto').prop('files')[0];
    var inputPreco = $('#inputPreco').val();
    var inputEstoque = $('#inputEstoque').val();
    var inputSupplierId = $('#inputSupplierId').val();


    var data = new FormData();
    data.append('inputProductId', inputProductId);
    data.append('inputProductName', inputProductName);
    data.append('inputProductDescription', inputProductDescription);
    data.append('Arquivo', inputProductPhoto);
    data.append('inputPreco', inputPreco);
    data.append('inputEstoque', inputEstoque);
    data.append('inputSupplierId', inputSupplierId);


    $.ajax({
        url: '/productCreate.php',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        success: function (response) {
            location.href = "productPageDetails.php";
            console.log(response);
        },
        error: function (response) {
            location.href = "productPageDetails.php";
            console.log("error in insert the file " + response);
        }
    });




}



var CreateUser = () => {


    var inputName = $('#inputName').val();
    var inputUsername = $('#inputUsername').val();
    var inputPassword = $('#inputPassword').val();
    var inputConfirmPassword = $('#inputConfirmPassword').val();

    var inputTypeUser = $('#inputTypeUser').val();

    if (inputTypeUser == undefined)
        inputTypeUser = 0;

    var inputPhone = $('#inputPhone').val();
    if (inputPhone == undefined)
        inputPhone = null;

    var inputCreditCard = $('#inputCreditCard').val();
    if (inputCreditCard == undefined)
        inputCreditCard = null;

    var inputAddressStreet = $('#inputAddressStreet').val();
    var inputAddressNumber = $('#inputAddressNumber').val();
    var inputAddressComplement = $('#inputAddressComplement').val();
    var inputAddressDistrict = $('#inputAddressDistrict').val();
    var inputAddressCep = $('#inputAddressCep').val();
    var inputAddressCity = $('#inputAddressCity').val();
    var inputAddressState = $('#inputAddressState').val();

    var returnUrl = $('#returnUrl').val();

    $.post('/createUser.php', {
        inputName: inputName,
        inputUsername: inputUsername,
        inputPassword: inputPassword,
        inputConfirmPassword: inputConfirmPassword,
        inputTypeUser: inputTypeUser,
        inputPhone: inputPhone,
        inputCreditCard: inputCreditCard,

        inputAddressStreet: inputAddressStreet,
        inputAddressNumber: inputAddressNumber,
        inputAddressComplement: inputAddressComplement,
        inputAddressDistrict: inputAddressDistrict,
        inputAddressCep: inputAddressCep,
        inputAddressCity: inputAddressCity,
        inputAddressState: inputAddressState,

    }, function (data) {
        if (data.status) {

            $.post('/executeLogin.php', { inputUsername: inputUsername, inputPassword: inputPassword }, function (data) {
                if (data.status) {
                    if (returnUrl)
                        window.location = returnUrl;
                    else
                        window.location = "index.php";
                }
                else
                    window.location = "index.php";
                AlertMessage(data.status, data.message);
            }, 'json');


        }
        else
            AlertMessage(data.status, data.message);
    }, 'json');

}

var EditUser = () => {
    var inputName = $('#inputName').val();
    var inputIdUsuario = $('#inputIdUsuario').val();

    var inputTypeUser = $('#inputTypeUser').val();

    if (inputTypeUser == undefined)
        inputTypeUser = 0;

    var inputPhone = $('#inputPhone').val();
    if (inputPhone == undefined)
        inputPhone = null;

    var inputCreditCard = $('#inputCreditCard').val();
    if (inputCreditCard == undefined)
        inputCreditCard = null;

    var inputAddressStreet = $('#inputAddressStreet').val();
    var inputAddressNumber = $('#inputAddressNumber').val();
    var inputAddressComplement = $('#inputAddressComplement').val();
    var inputAddressDistrict = $('#inputAddressDistrict').val();
    var inputAddressCep = $('#inputAddressCep').val();
    var inputAddressCity = $('#inputAddressCity').val();
    var inputAddressState = $('#inputAddressState').val();

    $.post('/editUser.php', {
        inputName: inputName,
        inputIdUsuario: inputIdUsuario,

        inputTypeUser: inputTypeUser,
        inputPhone: inputPhone,
        inputCreditCard: inputCreditCard,

        inputAddressStreet: inputAddressStreet,
        inputAddressNumber: inputAddressNumber,
        inputAddressComplement: inputAddressComplement,
        inputAddressDistrict: inputAddressDistrict,
        inputAddressCep: inputAddressCep,
        inputAddressCity: inputAddressCity,
        inputAddressState: inputAddressState,
    }, function (data) {

        if (data.status)
            window.location = "index.php";
        else
            AlertMessage(data.status, data.message);
    }, 'json');
}

var DeleteUser = (idUsuario) => {
    bootbox.confirm({
        message: "Deseja deletar esse usuário?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-purple'
            },
            cancel: {
                label: 'Não',
                className: 'btn-secondary'
            }
        },
        callback: function (result) {
            if (result) {
                $.getJSON('/deleteUser.php', { idUsuario: idUsuario }, function (data) {
                    if (data.status)
                        window.location = "userPage.php";
                    else
                        AlertMessage(data.status, data.message);
                });
            }
        }
    });

}

var SearchUser = () => {
    let search = {};
    search.idUsuario = $('#idInput').val();
    search.nome = $('#nameInput').val();
    search.login = $('#userNameInput').val();

    $.post('/userListPartial.php', { search: search }, function (data) {

        $('#display-users').html(data);

    }, 'html');


}

var UpdatePassword = () => {
    var inputIdUsuario = $('#inputIdUsuario').val();

    var inputOldPassword = $('#inputOldPassword').val();
    var inputNewPassword = $('#inputNewPassword').val();
    var inputConfirmNewPassword = $('#inputConfirmNewPassword').val();

    $.post('/updatePasswordUser.php', {
        inputIdUsuario: inputIdUsuario,
        inputOldPassword: inputOldPassword,
        inputNewPassword: inputNewPassword,
        inputConfirmNewPassword: inputConfirmNewPassword

    }, function (data) {

        if (data.status)
            window.location = "userPage.php";
        else {
            AlertMessage(data.status, data.message);
        }

    }, 'json');
}

var AlertMessage = (status, message) => {
    let className = "alert-success";
    if (!status)
        className = "alert-error";

    bootbox.alert({
        message: message,
        className: className,
        size: 'small'
    });

}

var ExecLogin = () => {
    var inputUsername = $('#inputUsername').val();
    var inputPassword = $('#inputPassword').val();

    var returnUrl = $('#returnUrl').val();

    $.post('/executeLogin.php', { inputUsername: inputUsername, inputPassword: inputPassword }, function (data) {
        if (data.status) {
            if (returnUrl)
                window.location = returnUrl;
            else
                indow.location = "index.php";

        }
        else
            AlertMessage(data.status, data.message);
    }, 'json');
}

var ExecLogout = () => {
    bootbox.confirm({
        message: "Deseja efetuar logout?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-purple'
            },
            cancel: {
                label: 'Não',
                className: 'btn-secondary'
            }
        },
        callback: function (result) {
            if (result) {
                $.getJSON('/executeLogout.php', function (data) {
                    if (data.status)
                        window.location = "index.php";
                    else
                        AlertMessage(data.status, data.message);
                });
            }
        }
    });
}