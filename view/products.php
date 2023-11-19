<?php
	
	require_once("../controller/connection.php");
	require_once("../models/Produto.php");

	$sql = "SELECT * FROM produto;";
	$stmt = $conn->prepare($sql);
	$products = array();
	try {
		$stmt->execute();
		$result = $stmt->fetchAll();
		// echo 'result:'.implode(',',$result[2]);
		if ($result) {
			foreach ($result as &$prod) {
				$product = new Produto($prod[0], $prod[1], $prod[2], $prod[3], $prod[4], $prod[5], $prod[6], $prod[7]);
				array_push($products, $product);
				
			}
			echo $products[0]->getDescProduto();//'result:'.implode(',',$products[0]);
		} else {
			echo "Produto não encontrado";
			return null;
		}
	} catch (PDOException $e) {
		echo "Erro ao buscar Produto: " . $e->getMessage();
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
</head>

<body>
	<header> <!-- Início da seção de cabeçalho -->
		<nav id="menu"> <!-- Início da barra de navegação -->
			<ul id="menuItems"> <!-- Início da lista de itens de menu -->
				<li id="logo" class="menuItem"> <!-- Item do menu: Logo -->
					<a href="../index.html"> <!-- Link para a página inicial -->
						<img src="../assets/logo.jpg" alt="logo"> <!-- Imagem do logotipo -->
					</a>
				</li>
				<li id="company" class="menuItem"> <!-- Item do menu: Empresa -->
					<a href="./company.html"> <!-- Link para a página de informações sobre a empresa -->
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
					<a href="./contact.html"> <!-- Link para a página de contato -->
						<div class="button">
							<p>Contato</p> <!-- Texto do botão -->
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
						echo "<img src=\"../assets/produtos/produto1.png\" alt=\"Produto 1\">";

						echo "<h2>".$product->getDescProduto()."</h2>";

						echo "<p>"."Voltagem: 110V"."</p>";
						echo "<p>"."Litragem: 27L"."</p>";
						echo "<p>"."Preço: "."R$".$product->getVlrSugerido()."</p>";

						echo "</li>";
					}
				?>


			</ul> <!-- Fim da lista de produtos -->
		</div> <!-- Fim da lista de produtos -->
	</section> <!-- Fim da seção de conteúdo -->

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
