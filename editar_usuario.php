<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}

// Simulação de dados do usuário (você pode buscar esses dados do banco de dados)
$currentUser = array(
    'id' => 1,
    'nome_completo' => 'Usuário Teste',
    'username' => 'usuario_teste',
    'cargo' => 'Admin'
);

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar os dados do formulário aqui (por exemplo, atualizar no banco de dados)

    // Redirecionar para a página de dashboard após editar o usuário
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand">Painel de Controle</span>
            <div class="ml-auto">
                <span>Bem-vindo, <?php echo $_SESSION['username']; ?></span>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Editar Usuário</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="nome_completo">Nome Completo:</label>
                        <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="<?php echo $currentUser['nome_completo']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $currentUser['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo:</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $currentUser['cargo']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
