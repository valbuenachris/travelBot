<?php

function dos($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    if ($status === 'inicio') {
        $menuMessage = tecnologia($pdo, $from, $mensaje);
    }
    elseif ($status === 'moda') {
        $menuMessage = menuRopaDeportiva($pdo, $from);
    }
    elseif ($status === 'ropaDeportiva') {
            $menuMessage = ropaDeportivaMujeres($pdo, $from, $mensaje);
    }
    elseif ($status === 'vestidos de baño') {
            $menuMessage = vestidosBanoMujer($pdo, $from, $mensaje);
    }
    elseif ($status === 'pijamas') {
            $menuMessage = pijamasMujer($pdo, $from, $mensaje);
    }
    elseif ($status === 'modaInfantil') {
            $menuMessage = modaNinas($pdo, $from, $mensaje);
    }
    elseif ($status === 'modaMujer') {
            $menuMessage = modaCasual($pdo, $from, $mensaje);
    }
    elseif ($status === 'modaHombre') {
            $menuMessage = busos($pdo, $from, $mensaje);
    }
    elseif ($status === 'joyas') {
            $menuMessage = cadenas($pdo, $from, $mensaje);
    }
    elseif ($status === 'accesorios') {
            $menuMessage = relojes($pdo, $from, $mensaje);
    }
    elseif ($status === 'hogar') {
            $menuMessage = menuDecoracion($pdo, $from);
    }
    elseif ($status === 'muebles') {
            $menuMessage = comedores($pdo, $from, $mensaje);
    }
    elseif ($status === 'decoracion') {
            $menuMessage = decoracionExteriores($pdo, $from, $mensaje);
    }
    elseif ($status === 'ferreteria') {
            $menuMessage = dotacion($pdo, $from, $mensaje);
            }
    elseif ($status === 'ropa cama') {
            $menuMessage = cubrelechos($pdo, $from, $mensaje);
    }
    elseif ($status === 'cocina') {
            $menuMessage = ollas($pdo, $from, $mensaje);
    }
    elseif ($status === 'mascota') {
            $menuMessage = mascotasComida($pdo, $from, $mensaje);
            }
    elseif ($status === 'estetica y cuidado') {
            $menuMessage = cremas($pdo, $from, $mensaje);
            }
    elseif ($status === 'salud y bienestar') {
            $menuMessage = farmacias($pdo, $from, $mensaje);
            }
    elseif ($status === 'calzado') {
            $menuMessage = sandalias($pdo, $from, $mensaje);
            }
    else  {
        $menuMessage = noValida($pdo, $from);
    }
    
}

?>
