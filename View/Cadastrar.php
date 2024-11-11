<?php

// Função para registrar um novo usuário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, senha) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);

    if ($stmt->execute()) {
        echo "Usuário registrado com sucesso!";
    } else {
        echo "Erro ao registrar usuário: " . $stmt->error;
    }
    $stmt->close();
    $conn->close(); // Fecha a conexão após o uso
}
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>

<body>
    <h2>Cadastro de Usuário</h2>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <br>
        <button type="submit">Cadastrar</button>
    </form>

    <br>
    <a href="login.php"><button>Ir para Login</button></a>
</body>

</html>