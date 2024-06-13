<?php

// Definir variables PDO
$pdo = null;
$pdo2 = null;

try {
    // Incluir archivos de funciones
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('funciones'));
    $file_list_functions = [];
    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $file_list_functions[] = $file->getPathname();
        }
    }
    foreach ($file_list_functions as $file) {
        include $file;
    }

    // Analizar datos de entrada
    $data = json_decode(file_get_contents('php://input'), true);
    file_put_contents('logwebhook.txt', '[' . date('Y-m-d H:i:s') . "]\n" . json_encode($data) . "\n\n", FILE_APPEND);

    $message = $data['message'] ?? null;
    $name = $data['name'] ?? null;
    $from = $data['from'] ?? null;
    $isGroup = $data['isGroup'] ?? null;
    $isMe = $data['isMe'] ?? null;
    $responseData = $data['responseData'] ?? null;

    // Verificar si el mensaje proviene de un grupo
    if ($isGroup) {
        die();
    }

    // Consultar el estado del pedido para el usuario dado
    $stmt = $pdo->prepare("SELECT * FROM sesiones WHERE user_id = ?");
    $stmt->execute([$from]);
    $pedido = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Procesamiento de mensajes
    
    switch (true) {
        case ($isGroup):
            die();
            break;
                case (strtolower($message) == 'salir'):
                    $responseData = borrar($pdo, $from);
                    break;
                case (strtolower($message) == 'ver'):
                    $responseData = ver($pdo, $from);
                    break;
                    
                case ($pedido && $pedido['status'] == 'registrar' && ($pedido['nombre'] == 'Sin Nombre')):
                    $responseData = manejarEstadoRegistrar($pdo, $from, $message);
                    break;
                case ($pedido && $pedido['status'] == 'consulta'):
                    $responseData = buscarProducto($pdo, $from, $message);
                    break;
               
                case (strtolower($message) == 'menu'):
                    $responseData = menu($pdo, $from);
                    break;
                    
                case (strtolower($message) == '0'):
                    $responseData = cero($pdo, $from);
                    break;
                case (strtolower($message) == '1'):
                    $responseData = uno($pdo, $from);
                    break;
                case (strtolower($message) == '2'):
                    $responseData = dos($pdo, $from);
                    break;
                case (strtolower($message) == '3'):
                    $responseData = tres($pdo, $from);
                    break;
                case (strtolower($message) == '4'):
                    $responseData = cuatro($pdo, $from);
                    break;
                case (strtolower($message) == '5'):
                    $responseData = cinco($pdo, $from);
                    break;
                case (strtolower($message) == '6'):
                    $responseData = seis($pdo, $from);
                    break;
                case (strtolower($message) == '7'):
                    $responseData = siete($pdo, $from);
                    break;
                case (strtolower($message) == '8'):
                    $responseData = ocho($pdo, $from);
                    break;
                    
                case (strtolower($message) == '9'):
                    $responseData = nueve($pdo, $from);
                    break;
                case (strtolower($message) == '10'):
                    $responseData = diez($pdo, $from);
                    break;
                    
                // Comparación de mensajes ignorando acentos
                case (strpos(remove_accents(strtolower($message)), 'buenos dias') !== false || strpos(remove_accents(strtolower($message)), 'buenas tardes') !== false
                || strpos(remove_accents(strtolower($message)), 'buenas noches') !== false || strpos(remove_accents(strtolower($message)), 'buenas') !== false
                || strpos(remove_accents(strtolower($message)), 'buen dia') !== false || strpos(remove_accents(strtolower($message)), 'buena tarde') !== false):
                    $responseData = responderSaludo($pdo, $from);
                    break;
                case (strpos(strtolower($message), 'ayuda') !== false || strpos(strtolower($message), 'ayudar') !== false || strpos(strtolower($message), 'asesor') !== false):
                    $responseData = ayuda($pdo, $from);
                    break;
                default:
                    $responseData = porDefecto($pdo, $from);
                    break;
    }
    
    // Respuesta al cliente
    print json_encode([
        'status' => 'success',
        'data' => json_encode($responseData)
    ]);
} catch (PDOException $e) {
    // Manejo de errores de base de datos
    print json_encode([
        'status' => 'error',
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    // Manejo de errores generales
    print json_encode([
        'status' => 'error',
        'message' => 'Error: ' . $e->getMessage()
    ]);
} finally {
    // Cierre de conexiones PDO
    if ($pdo) {
        $pdo = null;
    }
    if ($pdo2) {
        $pdo2 = null;
    }
}

?>