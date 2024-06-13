<?php

function cero($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    if ($status === 'inicio') {
        
        // Construir el mensaje del menú
        $menuMessage = buscar($pdo, $from);

    }
    
    elseif ($status === 'menuBuscar') {
        
        // Construir el mensaje del menú
        $menuMessage = buscar($pdo, $from);
        
    }
    
    else  {
        
        // Construir el mensaje del menú
        $menuMessage = noValida($pdo, $from);

    }
    
}

?>
