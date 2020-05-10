<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');

    require_once("/opt/lampp/htdocs/Consultas/Models/Categoria.php");

    if($_GET['key'] == 'null')
    {
        $ctg = new Categoria();
        $js = json_encode($ctg->getCategorias()) ;
        echo $js;
    }
    else 
    {
        $ctg = new Categoria();
        $js = json_encode($ctg->getCategoriasBy($_GET['key'])) ;
        echo $js;
    }
    

    // $servicesT = new ServiceTr();
    // $Tareas = $servicesT->getTareas();
    // $js = json_encode($Tareas);
    //echo($js);    
?>