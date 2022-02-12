<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/home.css">
<script src="<?php echo BASE_URL; ?>assets/js/app_home.js"></script>

<div class="crud home">
    <div class="add_usuario">
        <div class="usuario_header">
            <img src="<?php echo BASE_URL; ?>assets/images/ver_usuarios.png" alt="">
            Editar Registro
        </div>
        <div class="usuario_form">
            <form method="POST" action="<?php echo BASE_URL; ?>home/editar_registro_action/<?php echo $get_registro_data['id']; ?>">
                <input type="text" name="nome" placeholder="Nome: <?php echo $get_registro_data['nome']; ?>">
                <input type="email" name="email" placeholder="E-mail: <?php echo $get_registro_data['email']; ?>">
                <input type="password" name="senha" placeholder="Senha: ?">
                <input type="password" name="confirmar_senha" placeholder="Confirmar Senha: ?">
                <?php if(!empty($_SESSION['flash'])): ?>
                    <div class="crud_erro"><?php echo $_SESSION['flash']; ?></div>
                <?php endif; ?>
                <button type="submit" name="registro" class="button">Editar</button>
            </form>
        </div>
    </div>
</div>