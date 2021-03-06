<?php
$page_title = "Pesquisa detalhada";

include_once('DbFactory.php');

$limit = '10';
$page = 1;
if (@$_POST['page'] > 1) {
    $start = (($_POST['page'] - 1) * $limit);
    $page = @$_POST['page'];
} else {
    $start = 0;
}

$suppliersList =  $db->Fornecedor()->getTodosPagination($limit,$start);
$total_data = $db->Fornecedor()->countFornecedor();

$output = '
<label class="color-purple">Quantidade de Registros | ' . $total_data . '</label>
<table class="table">
  <thead class="thead-purple">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Número</th>
      <th scope="col">Data do pedido</th>
      <th scope="col">Data da entrega</th>
      <th scope="col">Situação</th>
      <th scope="col">Nome do usuário</th>
      <th>
    </tr>
  </thead>
';
if ($total_data > 0) {
  foreach ($suppliersList as $supplier) {
    

    $output .= '
    <tr class="adress-row" data-adress="'.$supplier->getId().'">
      <td>' . $supplier->getId() . '</td>
      <td>' . $supplier->getNome() . '</td>
      <td>' . $supplier->getDescricao() . '</td>
      <td>' . $supplier->getTelefone() . '</td>
      <td>' . $supplier->getEmail() . '</td>
     
      <td>

                    <div class="btn-group float-right" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-purple dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opções
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="supplierEdit.php?id='.$supplier->getId().'">Editar Fornecedor</a>
                            <a class="dropdown-item" href="supplierDelete.php?id="'. $supplier->getId().'">Deletar Fornecedor </a>
                        </div>
                    </div>

      </td>      
    </tr>

    <tr class="adress-details-'.$supplier->getId().'" style = "display:none;">


    </tr>
    ';
  }
} else {
  $output .= '
  <tr>
    <td colspan="2" align="center">Nenhum nome encontrado</td>
  </tr>
  ';
}

$output .= '
</table>
<div align="center">
  <ul class="pagination justify-content-center">
';

$total_links = ceil($total_data / $limit);
$previous_link = '';
$next_link = '';
$page_link = '';
$page_array = [];

if ($total_links > 4) {
  if ($page < 5) {
    for ($count = 1; $count <= 5; $count++) {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  } else {
    $end_limit = $total_links - 5;
    if ($page > $end_limit) {
      $page_array[] = 1;
      $page_array[] = '...';
      for ($count = $end_limit; $count <= $total_links; $count++) {
        $page_array[] = $count;
      }
    } else {
      $page_array[] = 1;
      $page_array[] = '...';
      for ($count = $page - 1; $count <= $page + 1; $count++) {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
} else {
  for ($count = 1; $count <= $total_links; $count++) {
    $page_array[] = $count;
  }
}

for ($count = 0; $count < count($page_array); $count++) {
  if ($page == $page_array[$count]) {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link background-purple" href="javascript:void(0)" data-page_number="' . $page. '">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if ($previous_id > 0) {
      $previous_link = '<li class="page-item"><a class="page-link color-purple" href="javascript:void(0)" data-page_number="' . $previous_id . '">Anterior</a></li>';
    } else {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Anterior</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if ($next_id >= $total_links) {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Próximo</a>
      </li>
        ';
    } else {
      $next_link = '<li class="page-item"><a class="page-link background-purple" href="javascript:void(0)" data-page_number="' . $next_id . '">Próximo</a></li>';
    }
  } else {
    if ($page_array[$count] == '...') {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    } else {
      $page_link .= '
      <li class="page-item"><a class="page-link color-purple" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;
