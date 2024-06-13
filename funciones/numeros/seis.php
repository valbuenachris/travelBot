<?php

function seis($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    if ($status === 'inicio') {
            $menuMessage = detalles($pdo, $from, $mensaje);
    }
    elseif ($status === 'moda') {
            $menuMessage = menuModaInfantil($pdo, $from, $mensaje);
    }
    elseif ($status === 'hogar') {
            $menuMessage = menuLimpieza($pdo, $from, $mensaje);
    }
    
    else  {
        $menuMessage = noValida($pdo, $from);

    }
    
}

?>