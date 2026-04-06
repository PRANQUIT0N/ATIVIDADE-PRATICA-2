<?php
session_start();
$erro = "";

$email_padrao = "aluno@alfaunipac.com.br";
$senha_padrao = "123456";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $alvo_email = $_SESSION['user_email'] ?? $email_padrao;
    $alvo_senha = $_SESSION['user_pass'] ?? $senha_padrao;

    if ($email === $alvo_email && $senha === $alvo_senha) {
        header("Location: feed.php");
        exit;
    } else {
        $erro = "E-mail ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="card p-4 shadow" style="width: 350px;">
        <h3 class="text-center mb-4">Acesso</h3>
        <?php if($erro): ?>
            <div class="alert alert-danger p-2 small"><?php echo $erro; ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="E-mail" required>
            </div>
            <div class="mb-3">
                <input type="password" name="senha" class="form-control" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Entrar</button>
            <div class="mt-3 text-center">
                <a href="cadastro.php" class="text-decoration-none small">Criar nova conta</a>
            </div>
        </form>
    </div>
</body>
</html>