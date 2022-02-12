<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/home.css">
<script src="<?php echo BASE_URL; ?>assets/js/app_home.js"></script>

<?php if(count($get_registros) > 0): ?>
    <div class="crud">
        <div class="crud_header">
            <div class="crud_item">ID *</div>
            <div class="crud_item">Nome *</div>
            <div class="crud_item">E-mail *</div>
            <div class="crud_item">Senha *</div>
            <div class="crud_item">Ações *</div>
        </div>
        <?php foreach($get_registros as $registro): ?>
            <div class="crud_content margin">
                <div class="crud_item text"><?php echo $registro['id']; ?> *</div>
                <div class="crud_item text"><?php echo $registro['nome']; ?> *</div>
                <div class="crud_item text"><?php echo $registro['email']; ?> *</div>
                <div class="crud_item text"><img src="<?php echo BASE_URL; ?>assets/images/lock.png" alt=""> *</div>
                <div class="crud_item text">
                    <a href="#"><img src="<?php echo BASE_URL; ?>assets/images/read.png" alt=""></a>
                    <a 
                        href="<?php echo BASE_URL; ?>home/editar_registro/<?php echo $registro['id']; ?>">
                        <img src="<?php echo BASE_URL; ?>assets/images/Edit.png" alt="">
                    </a>
                    <a href="#" onclick="delete_usuario(<?php echo $registro['id']; ?>,this)">
                        <img src="<?php echo BASE_URL; ?>assets/images/delete.png" alt="">
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="crud home">
        <h1>Nenhum Registro Disponivel</h1>
        <h3>Adicione novos registro na barra de navegacao acima </h3>
        <img src="<?php echo BASE_URL; ?>assets/images/ver_usuarios.png" alt="">
    </div>
<?php endif;?>
