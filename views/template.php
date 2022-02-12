<!DOCTYPE html>
<html>
	<head>
		<title>Projeto - Crud</title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/template.css">
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</head>
	<body>

		<div class="header">
			Projeto Crud01
		</div>
		<div class="crud_menu">
			<div class="crud_menu_left">
				<form method="POST" action="<?php echo BASE_URL; ?>home/query_registros">
					<input type="text" name="query" id="query_registro" 
						placeholder="Procure um registro pelo nome ou e-mail..">
					<div class="crud_item_lupa">
						<button type="submit" name="registros_query">
							<img src="<?php echo BASE_URL; ?>assets/images/lupa.png" alt="">
						</button>
					</div>
				</form>
			</div>
			<div class="crud_menu_right">
				<div class="crud_menu_right_items">
					<div class="crud_menu_right_item">
						<img src="<?php echo BASE_URL; ?>assets/images/homepage.png" alt="">
						<a href="<?php echo BASE_URL; ?>">Página Inicial</a>
					</div>
					<div class="crud_menu_right_item">
						<img src="<?php echo BASE_URL; ?>assets/images/ver_usuarios.png" alt="">
						<a href="<?php echo BASE_URL; ?>home/registros">Registros</a>
					</div>
					<div class="crud_menu_right_item">
						<img src="<?php echo BASE_URL; ?>assets/images/plus.png" alt="">
						<a href="<?php echo BASE_URL; ?>home/novo_usuario">Novo Usuário</a>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<?php $this->loadViewInTemplate($viewName,$viewData);?>
			<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
		</div>
	</body>
</html>