<?php
	require_once("./controller/session.php");
	require_once("./controller/connection.php");
	require_once("./models/Produto.php");
?>

<!doctype html> <!-- Declara o tipo de documento como HTML5 -->
<html lang="pt-br"> <!-- Define o idioma da página como português brasileiro -->

<head>
    <meta charset="utf-8"> <!-- Define a codificação de caracteres como UTF-8 (Unicode) -->
    <title>Rei dos Micro-ondas</title> <!-- Define o título da página exibido na aba do navegador -->
    <meta content="Edge"> <!-- Meta-informação para compatibilidade com o Microsoft Edge -->
    <meta name="viewport"
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0">
    <!-- Meta-informação para configuração da viewport em dispositivos móveis -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Pré-conexão para fontes do Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <!-- Pré-conexão para fontes do Google Fonts (com crossorigin) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> <!-- Inclui a fonte Roboto do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet"> <!-- Inclui a fonte Staatliches do Google Fonts -->
    <link rel="stylesheet" href="styles/indexStyles.css"> <!-- Inclui um arquivo CSS externo para estilos da página inicial -->
    <link rel="stylesheet" href="styles/headerFooterStyles.css"> <!-- Inclui um arquivo CSS externo para estilos do cabeçalho e rodapé -->
    <link rel="stylesheet" href="styles/shoppingCart.css"> 
</head>

<body class="body">
    <header id="header"> <!-- Início do cabeçalho -->
        <nav id="menu"> <!-- Início da barra de navegação -->
            <ul id="menuItems"> <!-- Início da lista de itens de menu -->
                <li id="logo" class="menuItem"> <!-- Item do menu: Logo -->
                    <a href="#"> <!-- Link para a página inicial -->
                        <img src="./assets/logo.jpg" alt="logo"> <!-- Imagem do logotipo -->
                    </a>
                </li>
                <li id="company" class="menuItem"> <!-- Item do menu: Empresa -->
                    <a href="./view/company.php"> <!-- Link para a página de informações sobre a empresa -->
                        <div class="button">
                            <p>Empresa</p> <!-- Texto do botão -->
                        </div>
                    </a>
                </li>
                <li id="products" class="menuItem"> <!-- Item do menu: Produtos -->
                    <a href="./view/products.php"> <!-- Link para a página de produtos -->
                        <div class="button">
                            <p>Produtos</p> <!-- Texto do botão -->
                        </div>
                    </a>
                </li>
                <li id="contact" class="menuItem"> <!-- Item do menu: Contato -->
                    <a href="./view/contact.php"> <!-- Link para a página de contato -->
                        <div class="button">
                            <p>Contato</p> <!-- Texto do botão -->
                        </div>
                    </a>
                </li>
                <li id="cart" class="menuItem"> <!-- Item do menu: Contato -->
					<?php
						$cartOpened = isset($_GET['cart']) && $_GET['cart'] == 1 ? 'cart=0' : 'cart=1';
						echo "<a href=\"./index.php?".$cartOpened."\">"// <!-- Link para a página de contato -->
					?>
						<div class="">
							<img src="./assets/icons/compras.png" alt="Carrinho de Compras" width="50">
						</div>
					</a>
				</li>

            </ul> <!-- Fim da lista de itens de menu -->
        </nav> <!-- Fim da barra de navegação -->
    </header> <!-- Fim do cabeçalho -->

    <section class="content"> <!-- Início da seção de conteúdo -->
        <div class="main"> <!-- Div principal para o conteúdo principal -->
            <img id="logoContent" src="./assets/logo.jpg" width="200" height="200"> <!-- Imagem do logotipo do conteúdo -->
            <h2 class="contentTitle">Rei do Micro-ondas</h2> <!-- Título do conteúdo -->
            <h3 class="contentText"> <!-- Texto do conteúdo -->
                Na nossa loja de micro-ondas, somos apaixonados por simplificar a vida na cozinha.
                Com décadas de experiência, nosso compromisso é fornecer produtos de alta qualidade que transformam
                tarefas cotidianas em momentos prazerosos. Estamos sempre inovando para atender às necessidades dos
                nossos clientes.
            </h3>
            <img class="image" src="./assets/microondas.png" alt="imagem" width="420" height="420"> <!-- Imagem no conteúdo -->
        </div> <!-- Fim do conteúdo principal -->
    </section> <!-- Fim da seção de conteúdo -->

    <div class="halfCircle"></div> <!-- Uma forma geométrica na página -->

    <!-- MODALS -->
	<?php 
		require_once('./view/modals/cart.php');
	?>

    <footer id="footer"> <!-- Início do rodapé -->
        <p>Copyright © Rei do Micro-ondas</p> <!-- Informação de direitos autorais -->
    </footer> <!-- Fim do rodapé -->
</body>

</html> <!-- Fim do documento HTML -->
