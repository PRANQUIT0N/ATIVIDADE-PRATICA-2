<?php
session_start();
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];
    $confirma = $_POST['confirma_senha'];

    if (empty($nome) || empty($email) || empty($senha)) {
        $erros[] = "Preencha todos os campos.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "E-mail inválido.";
    }
    if ($senha !== $confirma) {
        $erros[] = "As senhas não conferem.";
    }
    if (strlen($senha) < 6 || !preg_match('/[A-Z]/', $senha) || !preg_match('/[0-9]/', $senha)) {
        $erros[] = "Senha inválida (mínimo 6 caracteres, 1 maiúscula e 1 número).";
    }

    if (empty($erros)) {
        $_SESSION['user_email'] = $email;
        $_SESSION['user_pass'] = $senha;
        header("Location: index.php?msg=sucesso");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 card p-4 shadow">
                <h4 class="mb-3">Cadastro</h4>
                <?php foreach($erros as $e): ?>
                    <div class="alert alert-warning p-2 small"><?php echo $e; ?></div>
                <?php endforeach; ?>
                <form method="POST">
                    <input type="text" name="nome" class="form-control mb-2" placeholder="Nome" value="<?php echo $_POST['nome'] ?? ''; ?>">
                    <input type="email" name="email" class="form-control mb-2" placeholder="E-mail" value="<?php echo $_POST['email'] ?? ''; ?>">
                    <input type="password" name="senha" class="form-control mb-2" placeholder="Senha">
                    <input type="password" name="confirma_senha" class="form-control mb-2" placeholder="Confirmar Senha">
                    <input type="date" name="nasc" class="form-control mb-2">
                    <select name="sexo" class="form-select mb-3">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                    <button class="btn btn-primary w-100">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>