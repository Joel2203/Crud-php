<?php
function connection() {
    $config = require __DIR__ . '/config.php';

    try {
        $connect = mysqli_connect(
            $config['host'],
            $config['user'],
            $config['pass'],
            $config['db'],
            $config['port']
        );
        mysqli_set_charset($connect, 'utf8mb4');
        return $connect;
    } catch (mysqli_sql_exception $e) {
        error_log($e->getMessage());
        die('No se pudo conectar a la base de datos.');
    }
}