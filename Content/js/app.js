
$(()=>{

    $('#appBody').on('click', '#btn-create-user', ()=>{
        return CreateUser();
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

