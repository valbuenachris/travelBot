<?php

function menuDos($pdo, $from) {
    
    require_once __DIR__ . '/../api_key.php';
    $api_key = API_KEY;

        /*/////////////   MENSAJE SUBHEADER   ////////////*/

        $stmt = $pdo->query("SELECT * FROM menuDos");
        $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construir el mensaje del menú
        $menuMessage = " 🛍️ *OTRAS OPCIONES*\n\n";
        foreach ($menuItems as $item) {
            $menuMessage .= "{$item['icono']} {$item['item']}\n";
        }
        
        // Establecer la API utilizando la constante definida en api_key.php
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
        update_status($pdo, $from, 'menuDos');
}

?>
