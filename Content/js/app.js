
$(() => {


    $('#appBody').on('click', '#btn-create-product', () => {
        return CreateProduct();
    });

    $('#appBody').on('click', '#btn-edit-product', () => {
        //return EditProduct();
    });

    $('#appBody').on('click', '#btn-delete-product', () => {
        //return DeleteProduct();
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



})




var CreateProduct = () => {

    var inputProductPhoto = $('#inputProductPhoto').prop('files')[0];
    var inputProductName = $('#inputProductName').val();
    var inputProductDescription = $('#inputProductDescription').val();
    var inputPreco = $('#inputPreco').val();
    var inputSupplierId = $('#inputSupplierId').val();

    var data = new FormData();
    data.append('Arquivo', inputProductPhoto);
    data.append('inputProductName', inputProductName);
    data.append('inputProductDescription', inputProductDescription);
    data.append('inputPreco', inputPreco);
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
            console.log(response);
        },
        error: function (response) {
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
        if (data.status)
            window.location = "index.php";
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

    $.post('/executeLogin.php', { inputUsername: inputUsername, inputPassword: inputPassword }, function (data) {
        if (data.status)
            window.location = "index.php";
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