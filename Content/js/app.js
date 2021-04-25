
$(()=>{

    $('#appBody').on('click', '#btn-create-user', ()=>{
        return CreateUser();
    });

    $('#appBody').on('click', '#btn-edit-user', ()=>{
        return EditUser();
    });


    $('#appBody').on('click', '.btn-delete-user', (elem)=>{
        let idUsuario = $(elem.target).data('user');
        return DeleteUser(idUsuario);
    });

    $('#appBody').on('click', '#btn-new-password', ()=>{
        return UpdatePassword();
    });


    $('#appBody').on('click', '#btn-user-search', ()=>{
        return SearchUser();
    });


    $('#appBody').on('click', '#btn-execute-login', ()=>{
        return ExecLogin();
    });

  
   
   

})



var CreateUser = ()=>{
    var inputName = $('#inputName').val();
    var inputUsername = $('#inputUsername').val();
    var inputPassword = $('#inputPassword').val();
    var inputConfirmPassword = $('#inputConfirmPassword').val();

    $.post('/createUser.php', {inputName:inputName,inputUsername:inputUsername,inputPassword:inputPassword,inputConfirmPassword:inputConfirmPassword},function(data){
        if(data.status)
            window.location = "index.php";
        else
            AlertMessage(data.status, data.message);
    },'json');

}

var EditUser = ()=>{
    var inputName = $('#inputName').val();
    var inputIdUsuario = $('#inputIdUsuario').val();

    $.post('/editUser.php', {inputName:inputName,inputIdUsuario:inputIdUsuario},function(data){
    
        if(data.status)
            window.location = "userPage.php";
        else
            alert(data.message);
    },'json');
}

var DeleteUser = (idUsuario)=>{
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
            if(result){
                $.getJSON('/deleteUser.php', {idUsuario:idUsuario},function(data){
                    if(data.status)
                        window.location = "userPage.php";
                    else
                        alert(data.message);
                });
            }
        }
    });

}

var SearchUser = ()=>{
    let search = {};
    search.idUsuario = $('#idInput').val();
    search.nome = $('#nameInput').val();
    search.login = $('#userNameInput').val();

    $.post('/userListPartial.php', {search: search},function(data){
        
        $('#display-users').html(data);

    },'html');


}

var UpdatePassword = ()=>{
    var inputIdUsuario = $('#inputIdUsuario').val();

    var inputOldPassword = $('#inputOldPassword').val();
    var inputNewPassword = $('#inputNewPassword').val();
    var inputConfirmNewPassword = $('#inputConfirmNewPassword').val();
    
    $.post('/updatePasswordUser.php', {
            inputIdUsuario:inputIdUsuario, 
            inputOldPassword:inputOldPassword,
            inputNewPassword:inputNewPassword,
            inputConfirmNewPassword:inputConfirmNewPassword

        },function(data){

        if(data.status)
            window.location = "userPage.php";
        else{
            AlertMessage(data.status, data.message);
        }
        
    },'json');
}

var AlertMessage = (status, message) =>{
    let className = "alert-success";
    if(!status)
        className = "alert-error";

    bootbox.alert({
        message: message,
        className: className,
        size: 'small'
    });

}

var ExecLogin = ()=>{
    var inputUsername = $('#inputUsername').val();
    var inputPassword = $('#inputPassword').val();

    $.post('/executeLogin.php', {inputUsername:inputUsername,inputPassword:inputPassword},function(data){
        if(data.status)
            window.location = "index.php";
        else
            AlertMessage(data.status, data.message);
    },'json');
}

var ExecLogout = ()=>{
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
            if(result){
                $.getJSON('/executeLogout.php',function(data){
                    if(data.status)
                        window.location = "index.php";
                    else
                        alert(data.message);
                });
            }
        }
    });
}