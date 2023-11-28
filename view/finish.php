<?php
	require_once("../controller/session.php");
	require_once("../controller/connection.php");
	require_once("../models/Produto.php");
?>
<!DOCTYPE html> <!-- Declara o tipo de documento como HTML5 -->
<html lang="pt-br"> <!-- Define o idioma da página como português brasileiro -->

<head>
	<meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 (Unicode) -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura a viewport para dispositivos móveis -->
	<title>Contato</title> <!-- Define o título da página exibido na aba do navegador -->
	<link rel="stylesheet" href="../styles/finish.css"> <!-- Inclui um arquivo CSS externo para estilos específicos da página de contato -->
	<link rel="stylesheet" href="../styles/headerFooterStyles.css"> <!-- Inclui um arquivo CSS externo para estilos do cabeçalho e rodapé -->
</head>

<body>
	<header id="header"> <!-- Início da seção de cabeçalho -->
		<nav id="menu"> <!-- Início da barra de navegação -->
			<ul id="menuItems"> <!-- Início da lista de itens de menu -->
				<li id="logo" class="menuItem"> <!-- Item do menu: Logo -->
					<a href="../index.php"> <!-- Link para a página inicial -->
						<img src="../assets/logo.jpg" alt="logo"> <!-- Imagem do logotipo -->
					</a>
				</li>
				<li id="company" class="menuItem"> <!-- Item do menu: Empresa -->
					<a href="./company.php"> <!-- Link para a página de informações sobre a empresa -->
						<div class="button">
							<p>Empresa</p> <!-- Texto do botão -->
						</div>
					</a>
				</li>
				<li id="products" class="menuItem"> <!-- Item do menu: Produtos -->
					<a href="./products.php"> <!-- Link para a página de produtos -->
						<div class="button">
							<p>Produtos</p> <!-- Texto do botão -->
						</div>
					</a>
				</li>
				<li id="contact" class="menuItem"> <!-- Item do menu: Contato -->
					<a href="#"> <!-- Link para a página de contato (em branco, provavelmente para uso futuro) -->
						<div class="button"> <!-- Botão destacado para a página atual -->
							<p>Contato</p> <!-- Texto do botão -->
						</div>
					</a>
				</li>
				<li id="cart" class="menuItem"> <!-- Item do menu: Contato -->
					<?php
						$cartOpened = isset($_GET['cart']) && $_GET['cart'] == 1 ? 'cart=0' : 'cart=1';
						echo "<a href=\"./finish.php?".$cartOpened."\">"// <!-- Link para a página de contato -->
					?>
						<div class="">
							<img src="../assets/icons/compras.png" alt="Carrinho de Compras" width="50">
						</div>
					</a>
				</li>
			</ul> <!-- Fim da lista de itens de menu -->
		</nav> <!-- Fim da barra de navegação -->
	</header> <!-- Fim da seção de cabeçalho -->

	<section> <!-- Início da seção de conteúdo -->
		<div class="contactBackground"> <!-- Fundo de contato com links para redes sociais -->
			<a id="face" href="https://www.facebook.com/?locale=pt_BR" target="_blank">
				<img src="https://logopng.com.br/logos/facebook-13.png" alt="facebook" width="50" height="50">
			</a>
			<a id="instagram" href="https://www.instagram.com/" target="_blank">
				<img src="https://brunopalmahidroponia.com.br/wp-content/uploads/2020/07/logo-instagram-png-fundo-transparente.png"
					alt="instagram" width="50" height="50">
			</a>
			<a id="twitter" href="https://twitter.com/login?lang=pt" target="_blank">
				<img src="https://m.media-amazon.com/images/I/61w1Q5OxE2L.jpg" alt="twitter" width="50" height="50">
			</a>
			<a id="whatsApp" href="https://www.whatsapp.com" target="_blank">
				<img src="../assets/redes/wapp.jpg" alt="zap" width="50" height="50">
			</a>
			<a id="linkedin" href="https://www.linkedin.com" target="_blank">
				<img src="../assets/redes/linkedin.png" alt="linkedin" width="50" height="50">
			</a>
		</div> <!-- Fim do fundo de contato com links para redes sociais -->

		<div class="contactBackground2"> </div> <!-- Segundo fundo de contato (aparentemente vazio) -->

		<div class="contact"> <!-- Seção de formulário de contato -->
			<h1> Finalizar Compra </h1> <!-- Título da seção -->
			Entre com seus dados para confirmação
			<form class="form" method="POST" action="../controller/purchase.php"> <!-- Formulário de contato com ação definida como "contact.php" -->
				<label>Nome: <input type="text" name="name" id="name" value="<?php if (isset($_SESSION['name'])) echo $_SESSION['name'] ? $_SESSION['name'] : '' ?>"></label> <!-- Campo de nome -->
				<label>data_nascimento: <input type="date" name="datNasc" id="datNasc" value="<?php if (isset($_SESSION['datNasc'])) echo $_SESSION['datNasc'] ? $_SESSION['datNasc'] : '' ?>"></label> <!-- Campo de nome -->
				<label>CPF/CNPJ: <input type="text" name="cpfcnpj" id="cpfcnpj" value="<?php if (isset($_SESSION['cpfcnpj'])) echo $_SESSION['cpfcnpj'] ? $_SESSION['cpfcnpj'] : '' ?>""></label> <!-- Campo de nome -->
				<label>Genero:  <!-- Campo motivo de contato -->
					<select name="gender"> <!-- Selecionar motivação -->
						<!-- Opções de motivação -->
						<option value="M" <?php if (isset($_SESSION['gender'])) echo $_SESSION['gender'] == 'M' ? 'selected="selected"' : '' ?>> Masculino </option>
						<option value="F" <?php if (isset($_SESSION['gender'])) echo $_SESSION['gender'] == 'F' ? 'selected="selected"' : '' ?>> Feminino </option>

					</select>
				</label>
				<label>Origem: <input type="text" name="origem" id="origem" value="<?php if (isset($_SESSION['origem'])) echo $_SESSION['origem'] ? $_SESSION['origem'] : '' ?>"></label> <!-- Campo de nome -->
				<label>Email: <input type="email" name="email" id="email" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email'] ? $_SESSION['email'] : '' ?>"></label> <!-- Campo de nome -->
				<hr>
				<label>Telefone: <input type="text" name="phone" id="phone" value="<?php if (isset($_SESSION['phone'])) echo $_SESSION['phone'] ? $_SESSION['phone'] : '' ?>"></label> <!-- Campo de nome -->
				<hr>
				<label>Rua (logradouro): <input type="text" name="street" id="street" value="<?php if (isset($_SESSION['street'])) echo $_SESSION['street'] ? $_SESSION['street'] : '' ?>"></label> <!-- Campo de nome -->
				<label>Numero: <input type="text" name="number" id="number" value="<?php if (isset($_SESSION['number'])) echo $_SESSION['number'] ? $_SESSION['number'] : '' ?>"></label> <!-- Campo de nome -->
				<label>Complemento: <input type="text" name="complement" id="complement" value="<?php if (isset($_SESSION['complement'])) echo $_SESSION['complement'] ? $_SESSION['complement'] : '' ?>"></label> <!-- Campo de nome -->
				<label>CEP: <input type="text" name="cep" id="cep" value="<?php if (isset($_SESSION['cep'])) echo $_SESSION['cep'] ? $_SESSION['cep'] : '' ?>"></label> <!-- Campo de nome -->
				<label>Bairro: <input type="text" name="bairro" id="bairro" value="<?php if (isset($_SESSION['bairro'])) echo $_SESSION['bairro'] ? $_SESSION['bairro'] : '' ?>"></label> <!-- Campo de nome -->
				<label>Cidade: <input type="text" name="city" id="city" value="<?php if (isset($_SESSION['city'])) echo $_SESSION['city'] ? $_SESSION['city'] : '' ?>"></label> <!-- Campo de nome -->
				<label>Estado: <input type="text" name="uf" id="uf" value="<?php if (isset($_SESSION['uf'])) echo $_SESSION['uf'] ? $_SESSION['uf'] : '' ?>"></label> <!-- Campo de nome -->
				<hr>
				<input type="text" name="products" id="products" readonly value="<?php
					echo implode(',', $_SESSION['shop_list']);
				?>" style="visibility: hidden">
				<input type="submit" class="submit" value="CONFIRMAR" > <!-- Botão de envio -->
			</form> <!-- Fim do formulário de contato -->
		</div> <!-- Fim da seção de formulário de contato -->
	</section> <!-- Fim da seção de conteúdo -->

	<!-- MODALS -->
	<?php 
		require_once('./modals/cart.php');
	?>

	<footer id="footer" style=""> <!-- Início da seção de rodapé -->
		<p> <!-- Parágrafo de texto -->
			Copyright &copy; Rei do Micro-ondas <!-- Informação de direitos autorais -->
		</p>
	</footer> <!-- Fim da seção de rodapé -->
</body>

</html> <!-- Fim do documento HTML -->
