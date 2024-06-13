<?php

function cinco($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    if ($status === 'inicio') {
            $menuMessage = menuSaludBienestar($pdo, $from);
    }
    elseif ($status === 'moda') {
            $menuMessage = menuPijamas($pdo, $from);
    }
    elseif ($status === 'accesorios') {
            $menuMessage = cinturones($pdo, $from, $mensaje);
    }
    elseif ($status === 'joyas') {
            $menuMessage = tobilleras($pdo, $from, $mensaje);
    }
    elseif ($status === 'modaMujer') {
            $menuMessage = modaRopaIntima($pdo, $from, $mensaje);
    }
    elseif ($status === 'modaHombre') {
            $menuMessage = jeansPantalones($pdo, $from, $mensaje);
    }
    elseif ($status === 'muebles') {
            $menuMessage = sillas($pdo, $from, $mensaje);
    }
    elseif ($status === 'ropa cama') {
            $menuMessage = toallas($pdo, $from, $mensaje);
    }
    elseif ($status === 'hogar') {
            $menuMessage = menuCocina($pdo, $from);
    }
    elseif ($status === 'cocina') {
            $menuMessage = vasosJarras($pdo, $from, $mensaje);
    }
    elseif ($status === 'estetica y cuidado') {
            $menuMessage = perfumes($pdo, $from, $mensaje);
    }
    else  {
        $menuMessage = noValida($pdo, $from);

    }
    
}

?>
