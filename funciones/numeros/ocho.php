<?php

function ocho($pdo, $from) {
    // Verificar si el estado es igual a 'inicio'
    $stmt = $pdo->prepare("SELECT status FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $status = $stmt->fetchColumn();
    
    if ($status === 'inicio') {
            $menuMessage = menuFerreteria($pdo, $from);
    }
    elseif ($status === 'moda') {
            $menuMessage = menuModaHombre($pdo, $from);
    }
    
    else  {
        $menuMessage = noValida($pdo, $from);

    }
    
}

?>
