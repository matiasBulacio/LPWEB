<?php
    require_once('./session.php');
    require_once('./connection.php');

    $name       = $_POST['name'];
    $dataNasc   = $_POST['datNasc'];
    $cpfcnpj    = $_POST['cpfcnpj'];
    $gender     = $_POST['gender'];
    $origem     = $_POST['origem'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $street     = $_POST['street'];
    $number     = $_POST['number'];
    $complement = $_POST['complement'];
    $cep        = $_POST['cep'];
    $bairro     = $_POST['bairro'];
    $city       = $_POST['city'];
    $uf         = $_POST['uf'];
    $product    = $_POST['products'];

    $err = false;

    if (!isset($name) ||
    !isset($dataNasc) ||  
    !isset($cpfcnpj) ||   
    !isset($gender) ||    
    !isset($origem) ||    
    !isset($email) ||     
    !isset($phone) ||     
    !isset($street) ||    
    !isset($number) ||    
    !isset($complement) ||
    !isset($cep) ||       
    !isset($bairro) ||    
    !isset($city) ||      
    !isset($uf) ||
    !isset($product)) $err = true;

    $_SESSION['shop_list'] = array(); //reinicia carrinho de compras

    if (!$err) {
        try {
            $currentDate = date('Y-m-d H:i:s');
            $existingClient = 'SELECT id FROM cliente WHERE cpf_cnpj = ? LIMIT 1;';
            $newClient = 'INSERT INTO cliente (nome, data_nascimento, data_cadastro, cpf_cnpj, genero) VALUES (?, ?, ?, ?, ?);';

            $stmt = $conn->prepare($existingClient);
            $stmt->execute(array($cpfcnpj));
            $clientId = $stmt->fetch();
            if ($clientId) $clientId = $clientId['id'];
            if (!$clientId) {
                $stmt = $conn->prepare($newClient);
                $stmt->execute(array($name, $dataNasc, $currentDate, $cpfcnpj, $gender));

                $stmt = $conn->prepare($existingClient);
                $stmt->execute(array($cpfcnpj));
                $clientId = $stmt->fetch();
                $clientId = $clientId['id'];
            }

            echo $clientId;

            $existingMail = 'SELECT id FROM email WHERE id_cliente = ? LIMIT 1;';
            $newMail = 'INSERT INTO email (id_cliente, email, tipo) VALUES (?, ?, ?);';

            $stmt = $conn->prepare($existingMail);
            $stmt->execute(array($clientId));
            $mailId = $stmt->fetch();
            if ($mailId) $mailId = $mailId['id'];
            if (!$mailId) {
                $stmt = $conn->prepare($newMail);
                $stmt->execute(array($clientId, $email, 'default type'));

                $stmt = $conn->prepare($existingMail);
                $stmt->execute(array($clientId));
                $mailId = $stmt->fetch();
                $mailId = $mailId['id'];
            }

            echo $mailId;

            $phoneSQL = 'SELECT numero FROM fone WHERE numero = ?';
            $stmt = $conn->prepare($phoneSQL);
            $stmt->execute(array($phone));
            $resultPhone = $stmt->fetch();
            if (!$resultPhone && !$resultPhone['numero'] == $phone) {
                $newPhone = 'INSERT INTO fone (id_cliente, numero, tipo, contato) VALUES (?, ?, ?, ?);';
                $stmt = $conn->prepare($newPhone);
                $stmt->execute(array($clientId, $phone, 'pessoal', $name));
            }


            $existingEndereco = 'SELECT id FROM endereco WHERE id_cliente = ? LIMIT 1;';
            $newEndereco = 'INSERT INTO endereco (id_cliente, logradouro, numero, complemento, cep, bairro, cidade, estado, tipo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);';

            $stmt = $conn->prepare($existingEndereco);
            $stmt->execute(array($clientId));
            $enderecoId = $stmt->fetch();
            if ($enderecoId) $enderecoId = $enderecoId['id'];
            if (!$enderecoId) {
                $stmt = $conn->prepare($newEndereco);
                $stmt->execute(array($clientId, $street, $number, $complement, $cep, $bairro, $city, $uf, 'residencial'));

                $stmt = $conn->prepare($existingEndereco);
                $stmt->execute(array($clientId));
                $enderecoId = $stmt->fetch();
                $enderecoId = $enderecoId['id'];
            }

            echo $enderecoId;

            $venda = 'INSERT INTO venda (id_cliente, id_vendedor, data, status, prc_desconto) VALUES (?,?,?,?,?)';
            $sellerId = mt_rand(1,20);
            $stmt = $conn->prepare($venda);
            $stmt->execute(array($clientId, $sellerId, $currentDate, 'success', 0));

            $venda = 'SELECT id, data from venda WHERE id_cliente = ? AND id_vendedor = ? order by data DESC';
            $stmt = $conn->prepare($venda);
            $stmt->execute(array($clientId, $sellerId));
            $vendaId = $stmt->fetch();
            if ($vendaId) $vendaId = $vendaId['id'];

            $itemVenda = 'INSERT INTO venda_item (id_venda, id_produto, vlr_venda, qtd_vendas, status) VALUES (?,?,?,?,?)';

            $sql = "SELECT * FROM produto WHERE id IN ($product)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            if ($results) {
                foreach ($results as $result) {
                    $stmt = $conn->prepare($itemVenda);
                    $stmt->execute(array($vendaId, $result['id'], $result['vlr_custo'], 1, 'complete'));
                }

            }
            
            

        

        } catch (PDOException $e) {
            echo $e->getMessage();
            $err = true;
        }

        
        $_SESSION['name'] = $name;
        $_SESSION['datNasc'] = $dataNasc;
        $_SESSION['cpfcnpj'] = $cpfcnpj;
        $_SESSION['gender'] = $gender;
        $_SESSION['origem'] = $origem;
        $_SESSION['email'] = $email ;
        $_SESSION['phone'] = $phone ;
        $_SESSION['street'] = $street;
        $_SESSION['number'] = $number;
        $_SESSION['complement'] = $complement;
        $_SESSION['cep'] = $cep;
        $_SESSION['bairro'] = $bairro;
        $_SESSION['city'] = $city;
        $_SESSION['uf'] = $uf;

    }
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
    <link rel="stylesheet" href="../styles/headerFooterStyles.css"> <!-- Inclui um arquivo CSS externo para estilos do cabeçalho e rodapé -->
</head>

<body class="body">
    <header id="header"> <!-- Início do cabeçalho -->
        <nav id="menu"> <!-- Início da barra de navegação -->
            <ul id="menuItems"> <!-- Início da lista de itens de menu -->
                <li id="logo" class="menuItem"> <!-- Item do menu: Logo -->
                    <a href="../index.php"> <!-- Link para a página inicial -->
                        <img src="../assets/logo.jpg" alt="logo"> <!-- Imagem do logotipo -->
                    </a>
                </li>
                <li id="company" class="menuItem"> <!-- Item do menu: Empresa -->
                    <a href="../view/company.php"> <!-- Link para a página de informações sobre a empresa -->
                        <div class="button">
                            <p>Empresa</p> <!-- Texto do botão -->
                        </div>
                    </a>
                </li>
                <li id="products" class="menuItem"> <!-- Item do menu: Produtos -->
                    <a href="../view/products.php"> <!-- Link para a página de produtos -->
                        <div class="button">
                            <p>Produtos</p> <!-- Texto do botão -->
                        </div>
                    </a>
                </li>
                <li id="contact" class="menuItem"> <!-- Item do menu: Contato -->
                    <a href="../view/contact.php"> <!-- Link para a página de contato -->
                        <div class="button">
                            <p>Contato</p> <!-- Texto do botão -->
                        </div>
                    </a>
                </li>

            </ul> <!-- Fim da lista de itens de menu -->
        </nav> <!-- Fim da barra de navegação -->
    </header> <!-- Fim do cabeçalho -->

    <section>
        <?php
            echo $err ? 'OCORREU UM ERRO, COMPRA REJEITADA' : 'COMPRA APROVADA, EM BREVE ENVIAREMOS O PRODUTO'
        ?>
    </section>

    <footer id="footer"> <!-- Início do rodapé -->
        <p>Copyright © Rei do Micro-ondas</p> <!-- Informação de direitos autorais -->
    </footer> <!-- Fim do rodapé -->
</body>

</html> <!-- Fim do documento HTML -->
