<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Validar dados
    if (!empty($nome) && !empty($email)) {
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        
        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o usuário.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <style>
        body {
            background-color: #e0ffe0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        table {
            background: white;
            border-collapse: collapse;
            width: 80%;
            max-width: 800px;
            margin-top: 20px;
        }
        th, td {
            border: 2px solid #4169E1;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4169E1;
            color: white;
        }
        input {
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #4169E1;
            border-radius: 4px;
            width: 200px;
        }
        button {
            background-color: #4169E1;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #3158d3;
        }
        h1, h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Usuários</h1>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <h2>Usuários Cadastrados</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <?php
        $query = "SELECT nome, email FROM usuarios";
        $result = $conn->query($query);
        
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
