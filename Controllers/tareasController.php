<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');

    require_once("/opt/lampp/htdocs/Consultas/Models/Tarea.php");

    if($_GET['key'] == "TODAS")
    {
        $Trs = new Tarea();
        $js = json_encode($Trs->getTareas());
        echo $js;
    }
    else 
    {
        $Trs = new Tarea();
        $js = json_encode($Trs->getTareasBy($_GET['key']));
        echo $js;
    }

    // $servicesT = new ServiceTr();
    // $Tareas = $servicesT->getTareas();
    // $js = json_encode($Tareas);
    //echo($js);
    //var_dump($_GET);
    
?>