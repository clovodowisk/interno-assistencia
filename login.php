<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script>
    // Função para mostrar a mensagem de erro como um pop-up
    function showErrorMessage(message) {
        var errorMessage = document.createElement('div');
        errorMessage.classList.add('error-message');
        errorMessage.textContent = message;
        document.body.appendChild(errorMessage);
        setTimeout(function() {
            errorMessage.remove();
        }, 3000); // Remove o pop-up após 3 segundos (3000 milissegundos)
    }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <?php
            // Informações de conexão com o banco de dados
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $database = "sistema_os";

            // Criar conexão
            $conn = new mysqli($servername, $username, $password, $database);

            // Verificar conexão
            if ($conn->connect_error) {
                die("Erro de conexão: " . $conn->connect_error);
            }

            // Verifica se o formulário foi enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Consulta SQL para verificar se o usuário e a senha correspondem a registros no banco de dados
                $sql = "SELECT * FROM usuarios WHERE username = '$username'";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {
                    // Usuário encontrado, verifica a senha
                    $row = $result->fetch_assoc();
                    if (password_verify($password, $row['senha'])) {
                        // Autenticação bem-sucedida, redireciona para o painel de controle
                        session_start();
                        $_SESSION['username'] = $username;
                        header("Location: dashboard.php");
                        exit;
                    } else {
                        // Senha incorreta
                        echo "<script>showErrorMessage('Usuário ou senha incorretos.');</script>";
                    }
                } else {
                    // Usuário não encontrado
                    echo "<script>showErrorMessage('Usuário ou senha incorretos.');</script>";
                }
            }

            // Fechar conexão
            $conn->close();
            ?>
        </form>
    </div>
</body>
</html>
