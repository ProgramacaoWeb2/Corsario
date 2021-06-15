<!DOCTYPE HTML>
<html lang=pt-br>


<head>
	<meta charset="UTF-8">
    <script src="Content/jquery/jquery-3.6.0.min.js"></script>
    <script src="Content/bootstrap/popper.min.js" ></script>

    <script src="Content/bootstrap/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="Content/bootstrap/bootstrap.min.css">

    <script src="Content/bootbox/bootbox.min.js" ></script>
 
    <link href="Content/fonts/Roboto" rel="stylesheet">

    <link href="Content/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="Content/fontawesome/css/solid.min.css" rel="stylesheet">

    <link rel="stylesheet" href="Content/css/app.css" />
    <script src="Content/js/app.js"></script>
    

    
    
</head>

<body>

<header class="navbar navbar-expand-lg navbar-purple fixed-top navbar-dark">
  <a class="navbar-brand" href="index.php">
        <div id="appBrand">
            <img src="Content/images/appBrand.png" alt="">
            <span>Corsário</span>
        </div>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-hamburguer" aria-controls="nav-hamburguer" aria-expanded="false">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="nav-hamburguer">
    <ul class="navbar-nav ml-md-auto">

        <?php if(isset($_SESSION["idUsuario"])){ ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION["nomeUsuario"]?>
                </a>
                <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="userDropdown">
                    <?php if(isset($_SESSION["userType" == 1])){ ?>
                        <a class="dropdown-item" href="#">Meus pedidos</a>
                    <?php } ?>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="editUserPage.php?idUsuario=<?php echo $_SESSION["idUsuario"]?>"> Alterar meus dados</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="changePasswordPage.php?idUsuario=<?php echo $_SESSION["idUsuario"]?>"> Alterar minha senha</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:ExecLogout()">Logout</a>
                </div>
            </li>

            <?php if(isset($_SESSION["userType"]) && $_SESSION["userType"] == 1){ ?>
                <li> <div class="dropdown-divider"></div></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administração
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="adminDropdown" >
                        <a class="dropdown-item" href="supplierPageDetails.php">Fornecedores</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="orderPageDetails.php">Pedidos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="productPageDetails.php">Produtos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="userPage.php">Usuários</a>
                    </div>
                </li>
            <?php } ?>


        <?php } else { ?>
            <li class="nav-item active">
                <a class="nav-link" href="loginPage.php">Entrar</a>
            </li>
        <?php } ?>

     <li> <div class="dropdown-divider"></div></li>
     <?php if( !isset($_SESSION["userType"]) || $_SESSION["userType"] == 0){ ?>
        <li class="nav-item active">
            <a class="nav-link" href="#">Carrinho</a>
        </li>
      <?php } ?>
     
    </ul>
  </div>
</header>


<div id="appBody">