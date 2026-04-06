<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dont Give Knotless</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
session_start();
$nome_exibicao = $_SESSION['user_nome'] ?? "Usuário";
$user_exibicao = $_SESSION['user_email'] ?? "@anonimo";
?>
<script>
  
    const USUARIO_LOGADO = {
        nome: "<?php echo $nome_exibicao; ?>",
        usuario: "<?php echo $user_exibicao; ?>",
        foto: "img/foto de perfil.jpg" 
    };
</script>


<nav class="menu">
    <button class="nav-btn">
        <i class="bi bi-house-door-fill"></i>
        <span>Início</span>
    </button>

    <button class="nav-btn">
        <i class="bi bi-search"></i>
        <span>Pesquisa</span>
    </button>

    <button class="nav-btn">
        <i class="bi bi-plus-circle-fill"></i>
        <span>Nova Postagem</span>
    </button>

    <button class="nav-btn">
        <i class="bi bi-person-circle"></i>
        <span>Perfil</span>
    </button>
</nav>

<main class="conteudo">

 
    <section class="card p-3 mb-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="img/foto de perfil.jpg" class="foto me-3">

                <div>
                    <label class="nome">Leone Lopes</label>
                    <label class="usuario">@Leone</label>
                </div>
            </div>

            <button class="btn btn-outline-primary btn-sm">
                Editar Perfil
            </button>
        </div>
    </section>

   
    <section class="card p-3 mb-4">
        <form id="formPost">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="O que você está pensando?" required>
                <button class="btn btn-success">Postar</button>
            </div>
        </form>
    </section>

  
    <section id="areaPosts">

        <div class="post card p-3 mb-3">
            <div class="d-flex align-items-center mb-2">
                <img src="img/leon.png" class="fotopost me-2">
                <div>
                    <label class="nome">Leon S. Kennedy</label>
                    <label class="usuario">@Leon_S_Kennedy</label>
                </div>
            </div>

            <label class="conteudo-post">
                Nem clicou...Homem morte foi ceifado!
            </label>
            
            <div class="mt-2">
                <button class="btn btn-sm btn-outline-primary curtir">
                    <i class="bi bi-hand-thumbs-up"></i>
                    <span>Curtir</span>
                    <span class="contador">0</span>
                </button>
                <button class="btn btn-sm btn-outline-secondary comentar">
                    <i class="bi bi-chat"></i>
                    <span>Comentar</span>
                </button>
            </div>

            <div class="comentarios d-none mt-2">
                <input type="text" class="form-control comentarioInput mb-2" placeholder="Escreva um comentário">
                <button class="btn btn-primary btn-sm enviar">Enviar</button>
            </div>
            
        </div>
        
        <div class="post card p-3 mb-3">
            <div class="d-flex align-items-center mb-2">
                <img src="img/hunk.png" class="fotopost me-2">
                <div>
                    <label class="nome">HUNK</label>
                    <label class="usuario">@homem_morte</label>
                </div>
            </div>

            <label class="conteudo-post">
                So ganhou poeque o jogo era seu!
            </label>
            
            <div class="mt-2">
                <button class="btn btn-sm btn-outline-primary curtir">
                    <i class="bi bi-hand-thumbs-up"></i>
                    <span>Curtir</span>
                    <span class="contador">0</span>
                </button>
                <button class="btn btn-sm btn-outline-secondary comentar">
                    <i class="bi bi-chat"></i>
                    <span>Comentar</span>
                </button>
            </div>

            <div class="comentarios d-none mt-2">
                <input type="text" class="form-control comentarioInput mb-2" placeholder="Escreva um comentário">
                <button class="btn btn-primary btn-sm enviar">Enviar</button>
            </div>
            
        </div>


    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>