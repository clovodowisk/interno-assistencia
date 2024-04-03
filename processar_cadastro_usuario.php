<?php
// Inclui o arquivo de conexão com o banco de dados
require_once "conexão.php";

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = $_POST['nome_completo'];
    $username = $_POST['username'];
    $senha = $_POST['senha'];
    $cargo = $_POST['cargo'];

    // Verifica se o nome de usuário já existe na tabela
    $sql_check_username = "SELECT * FROM usuarios WHERE username = '$username'";
    $result_check_username = $conn->query($sql_check_username);
    if ($result_check_username->num_rows > 0) {
        // Nome de usuário já existe, exibe mensagem de erro
        echo "Erro: Nome de usuário já está em uso.";
    } else {
        // Criptografa a senha
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        // Prepara e executa a consulta SQL para inserir o novo usuário
        $sql = "INSERT INTO usuarios (nome_completo, username, senha, cargo) VALUES ('$nome', '$username', '$senhaCriptografada', '$cargo')";
        if ($conn->query($sql) === TRUE) {
            echo "Novo usuário cadastrado com sucesso.";
        } else {
            echo "Erro ao cadastrar novo usuário: " . $conn->error;
        }
    }
}

// Fecha a conexão
$conn->close();
?>
