<?php

function uno($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
        if ($status === 'inicio') {
                $menuMessage = menuModa($pdo, $from);
            }
        elseif ($status === 'moda') {
            $menuMessage = menuAccesorios($pdo, $from);
            }
        elseif ($status === 'accesorios') {
            $menuMessage = menuJoyas($pdo, $from);
            }
        elseif ($status === 'joyas') {
            $menuMessage = aretes($pdo, $from, $mensaje);
            }
        elseif ($status === 'ropaDeportiva') {
            $menuMessage = ropaDeportivaNinos($pdo, $from, $mensaje);
            }
        elseif ($status === 'vestidos de baño') {
            $menuMessage = vestidosBanoNino($pdo, $from, $mensaje);
            }
        elseif ($status === 'pijamas') {
            $menuMessage = pijamasNino($pdo, $from, $mensaje);
            }
        elseif ($status === 'modaInfantil') {
            $menuMessage = modaBebes($pdo, $from, $mensaje);
            }
        elseif ($status === 'modaMujer') {
            $menuMessage = modaBlusas($pdo, $from, $mensaje);
            }
        elseif ($status === 'modaHombre') {
            $menuMessage = boxer($pdo, $from, $mensaje);
            }
        elseif ($status === 'aretes' || $status === 'joyas' || $status === 'relojes' || $status === 'gafas' || $status === 'bolsos y carteras' 
        || $status === 'cinturones' || $status === 'menuBuscar' || $status === 'tecnologia' || $status === 'vestidos de baño infantil' 
        || $status === 'vestidos de baño mujer'  || $status === 'blusas' 
        || $status === 'vestidos de baño hombre' || $status === 'pijamas de niño' || $status === 'pijamas de mujer' || $status === 'pijamas de hombre'
         || $status === 'boxer y medias' || $status === 'busos' || $status === 'camisas' || $status === 'moda hombre casual' || $status === 'jeans y pantalones' 
         || $status === 'cobijas' || $status === 'cubrelechos' || $status === 'edredones' || $status === 'sabanas'  || $status === 'toallas'  || $status === 'camas'
         || $status === 'cubiertos' || $status === 'ollas' || $status === 'utencilios' || $status === 'vajillas' || $status === 'vasos y jarras' 
         || $status === 'aseo' || $status === 'construccion' || $status === 'dotacion' || $status === 'herramientas' || $status === 'pinturas' 
         || $status === 'licores' || $status === 'detalles' || $status === 'accesorios para mascotas' || $status === 'comida para mascotas' 
         || $status === 'cuidado para mascotas' || $status === 'higiene para mascotas') {
            $menuMessage = menu($pdo, $from);
            }
        elseif ($status === 'hogar') {
            $menuMessage = menuMuebles($pdo, $from);
            }
        elseif ($status === 'muebles') {
            $menuMessage = camas($pdo, $from, $mensaje);
            }
        elseif ($status === 'decoracion') {
            $menuMessage = decoracionInteriores($pdo, $from, $mensaje);
            }
        elseif ($status === 'ferreteria') {
            $menuMessage = construccion($pdo, $from, $mensaje);
            }
        elseif ($status === 'ropa cama') {
            $menuMessage = cobijas($pdo, $from, $mensaje);
            }
        elseif ($status === 'cocina') {
            $menuMessage = cubiertos($pdo, $from, $mensaje);
            }
        elseif ($status === 'limpieza') {
            $menuMessage = aseo($pdo, $from, $mensaje);
            }
        elseif ($status === 'mascota') {
            $menuMessage = mascotasAccesorios($pdo, $from, $mensaje);
            }
        elseif ($status === 'salud y bienestar') {
            $menuMessage = menuEsteticaCuidado($pdo, $from, $mensaje);
            }
        elseif ($status === 'estetica y cuidado') {
            $menuMessage = cosmeticos($pdo, $from, $mensaje);
            }
        elseif ($status === 'calzado') {
            $menuMessage = deportivo($pdo, $from, $mensaje);
            }
        
            
        else  {
        $menuMessage = noValida($pdo, $from);
        }
    
} 

?>
