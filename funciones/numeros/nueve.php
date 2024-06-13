<?php

function nueve($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    if ($status === 'inicio') {
        // Construir el mensaje del menú
        $menuMessage = otros($pdo, $from);
    }
    elseif ($status === 'moda' ||  $status === 'tecnologia' ||  $status === 'hogar' ||  $status === 'mascota' ||  $status === 'salud y bienestar' 
    ||  $status === 'detalles' ||  $status === 'licores' ||  $status === 'ferreteria') {
        // Construir el mensaje del menú
        $menuMessage = menu($pdo, $from);
    }
    elseif ($status === 'joyas' || $status === 'relojes' || $status === 'gafas' || $status === 'bolsos y carteras' || $status === 'cinturones' ) {
        // Construir el mensaje del menú
        $menuMessage = menuAccesorios($pdo, $from);
    }
    elseif ($status === 'accesorios' || $status === 'ropaDeportiva' || $status === 'calzado' || $status === 'vestidos de baño' || $status === 'pijamas'  
    || $status === 'modaInfantil' || $status === 'modaMujer' || $status === 'modaHombre') {
        // Construir el mensaje del menú
        $menuMessage = menuModa($pdo, $from);
    }
    elseif ($status === 'aretes' || $status === 'cadenas' || $status === 'juegos' || $status === 'pulseras' || $status === 'tobilleras') {
        // Construir el mensaje del menú
        $menuMessage = menuJoyas($pdo, $from);
    }
    elseif ($status === 'ropaDeportivaNinos' || $status === 'ropaDeportivaMujeres' || $status === 'ropaDeportivaHombres') {
        // Construir el mensaje del menú
        $menuMessage = menuRopaDeportiva($pdo, $from);
    }
    elseif ($status === 'vestidos de baño infantil' || $status === 'vestidos de baño mujer' || $status === 'vestidos de baño hombre') {
        // Construir el mensaje del menú
        $menuMessage = menuVestidosBano($pdo, $from);
    }
    elseif ($status === 'pijamas de niño' || $status === 'pijamas de mujer' || $status === 'pijamas de hombre') {
        // Construir el mensaje del menú
        $menuMessage = menuPijamas($pdo, $from);
    }
    elseif ($status === 'moda bebés' || $status === 'moda niñas' || $status === 'moda niños') {
        // Construir el mensaje del menú
        $menuMessage = menuModaInfantil($pdo, $from);
    }
    elseif ($status === 'blusas' || $status === 'moda mujer casual' || $status === 'faldas y vestidos' || $status === 'pantalones para dama' 
    || $status === 'ropa íntima') {
        // Construir el mensaje del menú
        $menuMessage = menuModaMujer($pdo, $from);
    }
    elseif ($status === 'boxer y medias' || $status === 'busos' || $status === 'camisas' || $status === 'moda casual hombre' 
    || $status === 'jeans y pantalones') {
        // Construir el mensaje del menú
        $menuMessage = menuModaHombre($pdo, $from);
    }
    elseif ($status === 'muebles' || $status === 'decoracion' || $status === 'ferreteria' || $status === 'ropa cama' || $status === 'cocina' || $status === 'limpieza') {
        // Construir el mensaje del menú
        $menuMessage = menuHogar($pdo, $from);
    }
    elseif ($status === 'decoracion interiores' || $status === 'decoracion exteriores') {
        // Construir el mensaje del menú
        $menuMessage = menuDecoracion($pdo, $from);
    }
    elseif ($status === 'camas' || $status === 'comedores' || $status === 'escritorios' || $status === 'mesas' || $status === 'sillas') {
        // Construir el mensaje del menú
        $menuMessage = menuMuebles($pdo, $from);
    }
    elseif ($status === 'construccion' || $status === 'dotacion' || $status === 'herramientas' || $status === 'pinturas') {
        // Construir el mensaje del menú
        $menuMessage = menuFerreteria($pdo, $from);
    }
    elseif ($status === 'cobijas' || $status === 'cubrelechos' || $status === 'edredones' || $status === 'sabanas' || $status === 'toallas') {
        // Construir el mensaje del menú
        $menuMessage = menuRopaCama($pdo, $from);
    }
    elseif ($status === 'cubiertos' || $status === 'ollas' || $status === 'utencilios' || $status === 'vajillas' || $status === 'vasos y jarras') {
        // Construir el mensaje del menú
        $menuMessage = menuCocina($pdo, $from);
    }
    elseif ($status === 'aseo') {
        // Construir el mensaje del menú
        $menuMessage = menuLimpieza($pdo, $from);
    }
    elseif ($status === 'accesorios para mascotas' || $status === 'comida para mascotas' || $status === 'cuidado para mascotas' || $status === 'higiene para mascotas') {
        // Construir el mensaje del menú
        $menuMessage = menuMascota($pdo, $from);
    }
    elseif ($status === 'estetica y cuidado' || $status === 'farmacias' || $status === 'productos naturistas') {
        // Construir el mensaje del menú
        $menuMessage = menuSaludBienestar($pdo, $from);
    }
    elseif ($status === 'cosmeticos' || $status === 'cremas' || $status === 'desodorantes' || $status === 'jabones') {
        // Construir el mensaje del menú
        $menuMessage = menuEsteticaCuidado($pdo, $from);
    }
    
    else  {
        // Construir el mensaje del menú
        $menuMessage = noValida($pdo, $from);
    }
    
}

?>
