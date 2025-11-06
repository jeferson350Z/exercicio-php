<?php
$host = 'db'; // Nome do serviço MySQL no docker-compose
$dbname = 'usuario_db';
$username = 'usuario';
$password = 'senha';

try {
    // 1. Conexão com o banco de dados
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. SQL para criar a tabela, se ela não existir (IF NOT EXISTS)
    $sql_create_table = "
        CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE
        );
    ";
    
    // 3. Executar a criação da tabela
    $conn->exec($sql_create_table);
    
    // Adicionei UNIQUE ao email, o que é uma boa prática
    
} catch (PDOException $e) {
    echo "Erro ao conectar ou criar a tabela: " . $e->getMessage();
    exit;
}
?>