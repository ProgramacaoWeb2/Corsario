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
                <div class="dropdown-menu" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Meus Pedidos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:ExecLogout()">Logout</a>
                </div>
            </li>
            <li> <div class="dropdown-divider"></div></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Administração
                </a>
                <div class="dropdown-menu" aria-labelledby="adminDropdown">
                    <a class="dropdown-item" href="supplierPage.php">Fornecedores</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php">Pedidos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="productPage.php">Produtos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="userPage.php">Usuários</a>
                </div>
            </li>


        <?php } else { ?>
            <li class="nav-item active">
                <a class="nav-link" href="loginPage.php">Entrar</a>
            </li>
        <?php } ?>

     <li> <div class="dropdown-divider"></div></li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Carrinho</a>
      </li>
     
    </ul>
  </div>
</header>


<div id="appBody">