<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/home.css">
<script src="<?php echo BASE_URL; ?>assets/js/app_home.js"></script>

<div class="crud home">
    <div class="add_usuario">
        <div class="usuario_header">
            <img src="<?php echo BASE_URL; ?>assets/images/ver_usuarios.png" alt="">
            Novo usuário
        </div>
        <div class="usuario_form">
            <form method="POST" action="<?php echo BASE_URL; ?>home/novo_usuario">
                <input type="text" name="nome" placeholder="Nome:">
                <input type="email" name="email" placeholder="E-mail:">
                <input type="password" name="senha" placeholder="Senha:">
                <input type="password" name="confirmar_senha" placeholder="Confirmar Senha:">
                <?php if(!empty($_SESSION['flash'])): ?>
                    <div class="crud_erro"><?php echo $_SESSION['flash']; ?></div>
                <?php endif; ?>
                <button type="submit" class="button">Registrar</button>
            </form>
        </div>
    </div>
</div>