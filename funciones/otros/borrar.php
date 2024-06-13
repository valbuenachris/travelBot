<?php

    function borrar($pdo, $from) {
    try {
        
        // Eliminar registros de la tabla 'sesiones' donde 'user_id' coincide con el valor dado
        $stmt = $pdo->prepare("DELETE FROM sesiones WHERE user_id = ?");
        $stmt->execute([$from]);

        // Devolver un mensaje indicando que la eliminación ha sido exitosa
        return [
            'message_type' => 'text',
            'message' => [
                'message' => 'Ya puedes iniciar de nuevo en nuestro *MENÚ PRINCIPAL*.'
            ]
        ];
    } catch (PDOException $e) {
        // Manejar excepciones PDO
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
        die();
    }
}

    function nuevo($pdo, $from) {
        try {
            // Eliminar todos los registros de la tabla 'apuestas'
            $stmt = $pdo->prepare("DELETE FROM apuestas");
            $stmt->execute();
            
            $menuMessage = abrirJuego($pdo, $from);

    
            // Devolver un mensaje indicando que la eliminación ha sido exitosa
            return [
                'message_type' => 'text',
                'message' => [
                    'message' => 'Todos los registros de apuestas han sido eliminados. Ahora puedes iniciar de nuevo en nuestro *MENÚ PRINCIPAL*.'
                ]
            ];
        } catch (PDOException $e) {
            // Manejar excepciones PDO
            return [
                'message_type' => 'text',
                'message' => [
                    'message' => 'Error al eliminar los registros de apuestas: ' . $e->getMessage()
                ]
            ];
        }
    }


?>

