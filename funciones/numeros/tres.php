<?php

function tres($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    if ($status === 'inicio') {
            $menuMessage = menuHogar($pdo, $from);
    }
    elseif ($status === 'moda') {
            $menuMessage = menuCalzado($pdo, $from);
    }
    elseif ($status === 'vestidos de baño') {
            $menuMessage = vestidosBanoHombre($pdo, $from, $mensaje);
    }
    elseif ($status === 'pijamas') {
            $menuMessage = pijamasHombre($pdo, $from, $mensaje);
    }
    elseif ($status === 'modaInfantil') {
            $menuMessage = modaNinos($pdo, $from, $mensaje);
    }
    elseif ($status === 'modaMujer') {
            $menuMessage = modaFaldasVestidos($pdo, $from, $mensaje);
    }
    elseif ($status === 'modaHombre') {
            $menuMessage = camisas($pdo, $from, $mensaje);
    }
    elseif ($status === 'joyas') {
            $menuMessage = juegos($pdo, $from, $mensaje);
    }
    elseif ($status === 'accesorios') {
            $menuMessage = gafas($pdo, $from, $mensaje);
    }
    elseif ($status === 'ropaDeportiva') {
            $menuMessage = ropaDeportivaHombres($pdo, $from, $mensaje);
    }
    elseif ($status === 'hogar') {
            $menuMessage = menuFerreteria($pdo, $from);
    }
    elseif ($status === 'muebles') {
            $menuMessage = escritorios($pdo, $from, $mensaje);
    }
    elseif ($status === 'ferreteria') {
            $menuMessage = herramientas($pdo, $from, $mensaje);
            }
    elseif ($status === 'ropa cama') {
            $menuMessage = edredones($pdo, $from, $mensaje);
    }
    elseif ($status === 'cocina') {
            $menuMessage = utencilios($pdo, $from, $mensaje);
    }
    elseif ($status === 'mascota') {
            $menuMessage = mascotasCuidado($pdo, $from, $mensaje);
            }
    elseif ($status === 'salud y bienestar') {
            $menuMessage = productosNaturistas($pdo, $from, $mensaje);
            }
    elseif ($status === 'estetica y cuidado') {
            $menuMessage = desodorantes($pdo, $from, $mensaje);
            }
    elseif ($status === 'calzado') {
            $menuMessage = tacones($pdo, $from, $mensaje);
            }
    
    else  {
        $menuMessage = noValida($pdo, $from);
    }
    
}

?>
