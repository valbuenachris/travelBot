<?php

function buscar($pdo, $from) {
    
        require_once __DIR__ . '/../api_key.php';
        $api_key = API_KEY;
        
            $stmt = $pdo->query("SELECT * FROM headerBuscar ORDER BY RAND() LIMIT 1");
            $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                // Construir el mensaje del menú principal
                $menuMessage = "";
                foreach ($menuItems as $item) {
                    $menuMessage .= "{$item['mensaje']}";
                }
        
                require_once __DIR__ . '/../api_key.php';
                $api_key = API_KEY;
        
                // Mensaje de texto con el menú
                $body = array(
                    "api_key" => $api_key,
                    "receiver" => $from,
                    "data" => array("message" => $menuMessage)
                );

        // Enviar solicitud de texto
        $response = sendCurlRequestText($body);
        
        // Actualizar el estado 
        update_status($pdo, $from, 'consulta');
}

?>
