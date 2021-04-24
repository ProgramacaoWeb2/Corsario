
$(()=>{

    $('#appBody').on('click', '#btn-create-user', ()=>{
        return CreateUser();
    });


    $('#appBody').on('click', '.btn-delete-user', (elem)=>{
        let idUsuario = $(elem.target).data('user');
        return DeleteUser(idUsuario);
    });


    $('#appBody').on('click', '#btn-user-search', (elem)=>{
        return DeleteUser();
    });

   

})



var CreateUser = ()=>{
    var inputName = $('#inputName').val();
    var inputUsername = $('#inputUsername').val();
    var inputPassword = $('#inputPassword').val();
    var inputConfirmPassword = $('#inputConfirmPassword').val();

    $.post('/createUser.php', {inputName:inputName,inputUsername:inputUsername,inputPassword:inputPassword,inputConfirmPassword:inputConfirmPassword},function(data){
        if(data.status)
            windows.location = "userPage.php";
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

