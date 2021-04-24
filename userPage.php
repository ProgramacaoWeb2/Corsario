<?php include_once "Layout/layoutHeader.php"; ?>

<div class="col-md-12 col-sm-12 col-xs-12">
       
       <div class="page-title">
            <span>Lista de Usuários</span>
       </div>

       <div class="search-panel">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <label for="idInput"># </label>
                <input type="number" class="form-control form-control-sm" id="idInput" aria-describedby="idInput" placeholder="Ex: 1">
            </div>

            <div class="col-md-3 col-sm-4">
                <label for="nameInput">Nome </label>
                <input type="text" class="form-control form-control-sm" id="nameInput" aria-describedby="nameInput" placeholder="Ex: João">
            </div>

            <div class="col-md-3 col-sm-4">
                <label for="userNameInput">Login </label>
                <input type="text" class="form-control form-control-sm" id="userNameInput" aria-describedby="userNameInput" placeholder="Ex: joao@gmail.com">
            </div>
            <div class="col-md-12" >
                <button type="button" class="btn btn-purple mb-2 btn-sm" id="btn-user-search">Pesquisar</button>
            </div>
        </div>

     

       </div>
    
       <div id="display-users">
            <?php include_once "userListPartial.php";?>
       </div>

</div>


<?php include_once "Layout/layoutFooter.php"; ?>