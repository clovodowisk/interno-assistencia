<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar os dados do formulário aqui (por exemplo, inserir no banco de dados)

    // Redirecionar para a página de dashboard após criar a ordem de serviço
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Ordem de Serviço</title>
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
                <h2>Criar Ordem de Serviço</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="id">ID:</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <input type="text" class="form-control" id="modelo" name="modelo">
                    </div>
                    <div class="form-group">
                        <label for="defeito">Defeito:</label>
                        <input type="text" class="form-control" id="defeito" name="defeito">
                    </div>
                    <div class="form-group">
                        <label for="servico">Serviço:</label>
                        <input type="text" class="form-control" id="servico" name="servico">
                    </div>
                    <div class="form-group">
                        <label for="tecnico">Técnico:</label>
                        <input type="text" class="form-control" id="tecnico" name="tecnico">
                    </div>
                    <div class="form-group">
                        <label for="prazo">Prazo:</label>
                        <input type="text" class="form-control" id="prazo" name="prazo">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
