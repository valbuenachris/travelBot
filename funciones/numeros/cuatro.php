<?php

function cuatro($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    if ($status === 'inicio') {
            $menuMessage = menuMascota($pdo, $from);
    }
    elseif ($status === 'accesorios') {
            $menuMessage = bolsosCarteras($pdo, $from, $mensaje);
    }
    elseif ($status === 'joyas') {
            $menuMessage = pulseras($pdo, $from, $mensaje);
    }
    elseif ($status === 'moda') {
            $menuMessage = menuVestidosBano($pdo, $from);
    }
    elseif ($status === 'modaMujer') {
            $menuMessage = modaPantalonesMujer($pdo, $from, $mensaje);
    }
    elseif ($status === 'modaHombre') {
            $menuMessage = modaHombreCasual($pdo, $from, $mensaje);
    }
    elseif ($status === 'hogar') {
            $menuMessage = menuRopaCama($pdo, $from);
    }
    elseif ($status === 'muebles') {
            $menuMessage = mesas($pdo, $from, $mensaje);
    }
    elseif ($status === 'ferreteria') {
            $menuMessage = pinturas($pdo, $from, $mensaje);
    }
    elseif ($status === 'ropa cama') {
            $menuMessage = sabanas($pdo, $from, $mensaje);
    }
    elseif ($status === 'cocina') {
            $menuMessage = vasosJarras($pdo, $from, $mensaje);
    }
    elseif ($status === 'mascota') {
            $menuMessage = mascotasHigiene($pdo, $from, $mensaje);
            }
    elseif ($status === 'estetica y cuidado') {
            $menuMessage = jabones($pdo, $from, $mensaje);
            }
    elseif ($status === 'calzado') {
            $menuMessage = zapatos($pdo, $from, $mensaje);
            }
        
    else  {
        // Construir el mensaje del menú
        $menuMessage = noValida($pdo, $from);
    }
    
}

?>
