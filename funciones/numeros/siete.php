<?php

function siete($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    if ($status === 'inicio') {
            $menuMessage = licores($pdo, $from, $mensaje);
    }
    elseif ($status === 'moda') {
            $menuMessage = menuModaMujer($pdo, $from, $mensaje);
    }
    
    else  {
        $menuMessage = noValida($pdo, $from);

    }
    
}

?>
