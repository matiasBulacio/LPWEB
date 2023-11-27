<?php
	require_once("../controller/session.php");
	require_once("../controller/connection.php");
	require_once("../models/Produto.php");

	if (!isset($_SESSION['shop_list'])) $_SESSION['shop_list'] = array();

	if (isset($_GET['product']) && !in_array($_GET['product'], $_SESSION['shop_list'])) {
		$selectedProduct = $_GET['product'];
		array_push($_SESSION['shop_list'], $selectedProduct);
	}


	// $openProductsModal = $_SESSION['productModal'];


	$sql = "SELECT * FROM produto";
	$stmt = $conn->prepare($sql);
	$products = array();
	
	try {
		$stmt->execute();
		$result = $stmt->fetchAll();
		// echo 'result:'.implode(',',$result[2]);
		if ($result) {
			
			foreach ($result as &$prod) {
				$product = new Produto($prod['id'], $prod['desc_produto'], $prod['id_modelo'], $prod['capacidade'], $prod['vlr_sugerido'], $prod['vlr_custo'], $prod['voltagem'], $prod['id_cor'], $prod['image']);
				array_push($products, $product);
				
			}
		} else {
			// echo "Produto não encontrado";
			return null;
		}
	} catch (PDOException $e) {
		// echo "Erro ao buscar Produto: " . $e->getMessage();
		return null;
	}
?>

<!DOCTYPE html> <!-- Declara o tipo de documento como HTML5 -->
<html lang="pt-br"> <!-- Define o idioma da página como português brasileiro -->

<head>
	<meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 (Unicode) -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura a viewport para dispositivos móveis -->
	<title>Produtos</title> <!-- Define o título da página exibido na aba do navegador -->

	<link rel="stylesheet" href="../styles/headerFooterStyles.css"> <!-- Inclui um arquivo CSS externo para estilos do cabeçalho e rodapé -->
	<link rel="stylesheet" href="../styles/productsStyles.css"> <!-- Inclui um arquivo CSS externo para estilos específicos da página de produtos -->
	<link rel="stylesheet" href="../styles/shoppingCart.css"> <!-- Inclui um arquivo CSS externo para estilos específicos da página de produtos -->
</head>

<body>
	<header> <!-- Início da seção de cabeçalho -->
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
					<a href="#"> <!-- Link para a página de produtos (em branco, provavelmente para uso futuro) -->
						<div class="button selected"> <!-- Botão destacado para a página atual -->
							<p>Produtos</p> <!-- Texto do botão -->
						</div>
					</a>
				</li>
				<li id="contact" class="menuItem"> <!-- Item do menu: Contato -->
					<a href="./contact.php"> <!-- Link para a página de contato -->
						<div class="button">
							<p>Contato</p> <!-- Texto do botão -->
						</div>
					</a>
				</li>
				<li id="cart" class="menuItem"> <!-- Item do menu: Contato -->
					<?php
						$cartOpened = isset($_GET['cart']) && $_GET['cart'] == 1 ? 'cart=0' : 'cart=1';
						echo "<a href=\"./products.php?".$cartOpened."\">"// <!-- Link para a página de contato -->
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
		<div class="title"> <!-- Título da página -->
			<div class="background"> </div> <!-- Fundo do título (aparentemente vazio) -->
			<div class="background2"> </div> <!-- Segundo fundo do título (aparentemente vazio) -->

			<h1> Rei do Micro-ondas </h1> <!-- Título principal da página -->
		</div>

		<div id="productList"> <!-- Lista de produtos -->
			<ul class="products"> <!-- Início da lista de produtos -->
				<?php

					foreach ($products as $product) {
						echo "<li class = \"product\">";
						// echo "<img src=\"../assets/produtos/produto1.png\" alt=\"Produto 1\">";
						echo "<img src=\"".$product->getImage()."\" alt=\"Produto\">";

						echo "<h2>".$product->getDescProduto()."</h2>";

						echo "<p>"."Tensão (Voltagem pros intimos): 110V"."</p>";
						echo "<p>"."Capacidade: ".$product->getCapacidade()."L</p>";
						echo "<p>"."Preço: "."R$".str_replace('.', ',', $product->getVlrCusto())."</p>";
						$cartOpened = isset($_GET['cart']) && $_GET['cart'] == 1 ? '&cart=1' : '';
						?> 
							<a href="./products.php?product=<?php echo $product->getId().$cartOpened ?>">
								<div class="adicionarCarrinho">
									Adicionar ao Carrinho
									<img src="../assets/icons/plus.png" alt="Adicionar no carrinho" style="width: 40px; height: 40px"/>
								</div>
							<a>
						<?php
						echo "</li>";
					}
				?>


			</ul> <!-- Fim da lista de produtos -->
		</div> <!-- Fim da lista de produtos -->
	</section> <!-- Fim da seção de conteúdo -->

	<!-- MODALS -->
	<?php 
		require_once('./modals/cart.php');
	?>
	<footer id="footer"> <!-- Início da seção de rodapé -->
		<p> <!-- Parágrafo de texto -->
			Copyright &copy; Rei do Micro-ondas <!-- Informação de direitos autorais -->
		</p>
	</footer> <!-- Fim da seção de rodapé -->



</body> <!-- Fim do corpo da página -->

<script>
	// console.log(window.screen)
</script> <!-- Script JavaScript (comentado) -->
</html> <!-- Fim do documento HTML -->
