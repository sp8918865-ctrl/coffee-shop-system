<?php
// healthcheck.php
require_once __DIR__ . '/config/database.php';

header('Content-Type: application/json');

try {
    $pdo = getDBConnection();
    $stmt = $pdo->query('SELECT 1');
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Database connection successful!',
        'timestamp' => date('Y-m-d H:i:s')
    ], JSON_PRETTY_PRINT);
} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Database connection failed: ' . $e->getMessage(),
        'timestamp' => date('Y-m-d H:i:s')
    ], JSON_PRETTY_PRINT);
}
?>