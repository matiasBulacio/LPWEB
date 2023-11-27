<?php
  require_once('../controller/session.php');
  echo implode(',', $_SESSION['shop_list']);
?>
<!DOCTYPE html> <!-- Declara o tipo de documento como HTML5 -->
<html lang="en"> <!-- Define o idioma da página como inglês -->

<head>
  <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 (Unicode) -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Configura a viewport para dispositivos móveis -->
  <link rel="stylesheet" href="../styles/headerFooterStyles.css">
  <!-- Inclui um arquivo CSS externo para estilos do cabeçalho e rodapé -->
  <link rel="stylesheet" href="../styles/companyStyles.css">
  <!-- Inclui um arquivo CSS externo para estilos específicos da página -->
  <title>Companhia</title> <!-- Define o título da página exibido na aba do navegador -->
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
          <a href="company.php"> <!-- Link para a página de informações sobre a empresa -->
            <div class="button selected"> <!-- Botão destacado para a página atual -->
              <p>Empresa</p> <!-- Texto do botão -->
            </div>
          </a>
        </li>
        <li id="products" class="menuItem"> <!-- Item do menu: Produtos -->
          <a href="./products.php"> <!-- Link para a página de produtos -->
            <div class="button"> <!-- Botão -->
              <p>Produtos</p> <!-- Texto do botão -->
            </div>
          </a>
        </li>
        <li id="contact" class="menuItem"> <!-- Item do menu: Contato -->
          <a href="./contact.php"> <!-- Link para a página de contato -->
            <div class="button"> <!-- Botão -->
              <p>Contato</p> <!-- Texto do botão -->
            </div>
          </a>
        </li>
      </ul> <!-- Fim da lista de itens de menu -->
    </nav> <!-- Fim da barra de navegação -->
  </header> <!-- Fim da seção de cabeçalho -->

  <section class="content">
    <div class="button" style="background-color:blue; color:white;height:30px">
      <a href="#">Clientes</a>
    </div>
    <a href="./product">
      <div class="button" style="background-color:blue; color:white;height:30px">
        Produtos
      </div>
    </a>
  </section>

  <footer id="footer"> <!-- Início da seção de rodapé -->
    <p> <!-- Parágrafo de texto -->
      Copyright &copy; Rei do Micro-ondas <!-- Informação de direitos autorais -->
    </p>
  </footer> <!-- Fim da seção de rodapé -->
</body>

</html> <!-- Fim do documento HTML -->