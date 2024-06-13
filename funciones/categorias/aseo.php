<?php

function aseo($pdo, $from, $mensaje) {
    try {
        $articulo = 'aseo';
        
        $api_url = 'https://tienderu.com/myApiProject/myApi.php';
        $data = array(
            'search' => $articulo
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url . '?' . http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPGET, true);

        $response = curl_exec($ch);
        if ($response === false) {
            throw new Exception('Error en la solicitud cURL: ' . curl_error($ch));
        }
        curl_close($ch);

        $productos = json_decode($response, true);

        if (empty($productos)) {
            
            $respuesta = "No se encontraron productos que coincidan con *$articulo*";
            
            require_once __DIR__ . '/../api_key.php';
            $api_key = API_KEY;

            $body = array(
                "api_key" => $api_key,
                "receiver" => $from,
                "data" => array("message" => $respuesta)
            );

            $response = sendCurlRequestText($body);
            update_status($pdo, $from, $articulo);
            $menuMessage = menuRegresar($pdo, $from);
            
        } else {
            // Mezclar los productos en orden aleatorio
            shuffle($productos);
            
            $respuesta = "Resultados de la búsqueda para *$articulo*:\n\n";
            foreach ($productos as $producto) {
                $respuesta .= "📦 *{$producto['title']}*\n";
                $respuesta .= "💲 *{$producto['price']}*\n";
                $respuesta .= "🛒 {$producto['external_link']}\n";
                $respuesta .= "🛍️ *{$producto['shop_name']}*\n";
                $respuesta .= "📞 {$producto['phone_number']}\n________________________\n\n";
            }

            require_once 'api_key.php';
            $api_key = API_KEY;

            $body = array(
                "api_key" => $api_key,
                "receiver" => $from,
                "data" => array("message" => $respuesta)
            );

            $response = sendCurlRequestText($body);
            
            // Actualizar el estado 
            update_status($pdo, $from, $articulo);
            $menuMessage = menuRegresar($pdo, $from);
            
        }
    } catch (PDOException $e) {
        return [
            'message_type' => 'text',
            'message' => [
                'message' => 'Error en la base de datos: ' . $e->getMessage()
            ]
        ];
    } catch (Exception $e) {
        return [
            'message_type' => 'text',
            'message' => [
                'message' => 'Error: ' . $e->getMessage()
            ]
        ];
    }
}

?>
