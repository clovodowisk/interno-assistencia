<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}

$currentUser = $_SESSION['username'];
$currentDateTime = date('d/m/Y H:i');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="style_dashboard.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand">Painel de Controle</span>
            <div class="ml-auto">
                <p>Painel de Controle</p>
                <p>Bem-vindo, <?php echo $currentUser; ?> - <?php echo $currentDateTime; ?></p>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-9">
                <!-- Conteúdo da esquerda removido -->
            </div>
            <div class="col-md-3">
                <h2>Opções</h2>
                <div class="list-group">
                    <a href="cadastro_usuario.php" class="list-group-item">Criar Usuário</a>
                    <a href="editar_usuario.php" class="list-group-item">Editar Usuário</a>
                    <a href="criar_os.php" class="list-group-item">Criar O.S.</a>
                    <a href="#" class="list-group-item">Editar O.S.</a>
                    <a href="#" class="list-group-item">Visualizar O.S.</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
