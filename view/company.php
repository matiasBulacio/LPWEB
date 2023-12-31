<?php
require_once("../controller/session.php");
require_once("../controller/connection.php");
require_once("../models/Produto.php");
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
  <link rel="stylesheet" href="../styles/shoppingCart.css">
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

  <section> <!-- Início da seção de conteúdo -->
    <div class="companyInfo"> <!-- Contêiner para informações sobre a empresa -->
      <div id="vision" class="companyCard"> <!-- Cartão de informações sobre a visão da empresa -->
        <h2>Visão</h2> <!-- Título da seção -->
        <p> <!-- Parágrafo de texto -->
          Ser a loja referência dentro do setor de vendas de microondas <!-- Conteúdo da visão da empresa -->
        </p>
      </div> <!-- Fim do cartão de informações sobre a visão -->

      <div id="mission" class="companyCard"> <!-- Cartão de informações sobre a missão da empresa -->
        <h2>Missão</h2> <!-- Título da seção -->
        <p> <!-- Parágrafo de texto -->
          Promover e vender os melhores microondas aos clientes, prestando suporte de qualidade e excelência
          <!-- Conteúdo da missão da empresa -->
        </p>
      </div> <!-- Fim do cartão de informações sobre a missão -->

      <div id="companyValues" class="companyCard"> <!-- Cartão de informações sobre os valores da empresa -->
        <h2>Valores</h2> <!-- Título da seção -->
        <ul> <!-- Lista de valores -->
          <li>Relacionamento com o cliente</li> <!-- Item da lista -->
          <li>Excelência na entrega e atendimento</li> <!-- Item da lista -->
          <li>Comprometimento na venda</li> <!-- Item da lista -->
        </ul>
      </div> <!-- Fim do cartão de informações sobre os valores -->

      <div id="history" class="companyCard"> <!-- Cartão de informações sobre a história da empresa -->
        <h2>História</h2> <!-- Título da seção -->
        <!-- Textos -->
        <p>Fundado em 1995, o Rei dos Micro-ondas é líder no mercado de aparelhos de cozinha. Começamos como uma
          pequena loja local, mas agora atendemos nacionalmente.</p>
        <p>Nossa equipe apaixonada busca constantemente inovações para oferecer os melhores produtos, garantindo
          qualidade e durabilidade.</p>
        <p>Nosso compromisso com o cliente inclui <strong><a href="contact.php">atendimento excepcional</a></strong> e
          opções de pagamento flexíveis. </p>
        <p>Agradecemos por escolher o Rei dos Micro-ondas como seu parceiro na cozinha.
        <p>Esperamos continuar a servir você com os melhores produtos e soluções para sua cozinha nos anos vindouros.
        </p>
        <p>Explore nossa gama de <strong><a href="products.html">produtos</a></strong> e entre em contato conosco
          para qualquer dúvida ou assistência. </p>
        <p>Estamos aqui para tornar sua experiência na cozinha mais eficiente e agradável.</p>
        <p>Obrigado por confiar no Rei dos Micro-ondas!</p>
        <!-- Outros parágrafos da história da empresa e links relacionados seguem -->
      </div> <!-- Fim do cartão de informações sobre a história -->
    </div> <!-- Fim do contêiner para informações sobre a empresa -->
  </section> <!-- Fim da seção de conteúdo -->

  <!-- MODALS -->
  <?php
  // require_once('./modals/cart.php');
  ?>


  <footer id="footer"> <!-- Início da seção de rodapé -->
    <p> <!-- Parágrafo de texto -->
      Copyright &copy; Rei do Micro-ondas <!-- Informação de direitos autorais -->
    </p>
  </footer> <!-- Fim da seção de rodapé -->
</body>

</html> <!-- Fim do documento HTML -->