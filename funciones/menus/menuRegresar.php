<?php

    function menuRegresar($pdo, $from) {
    
            $stmt = $pdo->query("SELECT * FROM menuRegresar");
            $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                // Construir el mensaje del menú principal
                $menuMessage = "";
                foreach ($menuItems as $item) {
                    $menuMessage .= "{$item['icono']} {$item['item']}\n";
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
    }

?>
