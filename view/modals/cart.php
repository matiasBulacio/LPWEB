<?php
    // $_SESSION = array();
    if(isset($_GET['productRemove'])) {
        if (in_array($_GET['productRemove'], $_SESSION['shop_list'])) {
            unset($_SESSION['shop_list'][array_search($_GET['productRemove'],$_SESSION['shop_list'])]);
        }
    }
    if (isset($_GET['cart']) && $_GET['cart'] == 1) {
        $totalPrice = 0;
        $sizeShopList = sizeof($_SESSION['shop_list']);
        $shopList = $_SESSION['shop_list'];
        $mysqlIn = implode(',', $shopList);
        
        // require_once('../../controller/connection.php');
        if ($sizeShopList > 0){
            $sql = "select * from produto where id in ($mysqlIn)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $products = array();
            foreach ($result as &$prod) {
                $product = new Produto($prod['id'], $prod['desc_produto'], $prod['id_modelo'], $prod['capacidade'], $prod['vlr_sugerido'], $prod['vlr_custo'], $prod['voltagem'], $prod['id_cor'], $prod['image']);
                $totalPrice += $product->getVlrCusto();
                array_push($products, $product);
                
            }
        }
?>
    <html>

    <head>
    </head>

    <body>
        <div id="cartModal">
            <h2>Carrinho de Compras</h2>
            <section>
                <h3>Produtos selecionados</h3>
                <ul class="productList"> <!-- Início da lista de produtos -->
                <?php
                    if ($sizeShopList > 0) {
                        foreach ($products as $product) {
                            echo "<li class = \"product\">";
                            echo "<h3>".$product->getDescProduto()."</h2>";
                            echo "<img src=\"".$product->getImage()."\" alt=\"Produto\">";


                            echo "<p>"."Preço: "."R$".$product->getVlrCusto()."</p>";
                            $cartOpened = isset($_GET['cart']) && $_GET['cart'] == 1 ? '&cart=1' : '';
                            ?> 
                                <a href="./products.php?productRemove=<?php echo $product->getId().$cartOpened ?>">
                                    <div class="adicionarCarrinho">
                                        Remover do carrinho
                                        <img src="../assets/icons/minus.png" alt="" style="width: 40px; height: 40px"/>
                                    </div>
                                <a>
                            <?php
                            echo "</li>";
                        }
					}
                ?>
                </ul>
                <?php if ($sizeShopList > 0) {?>
                    <div id="finalPrice">
                        <?php echo "<p>"."Preço Total: "."R$".str_replace('.', ',', $totalPrice)."</p>"; ?>
                    </div>
                <a href="../view/finish.php">
                    <div id="finish">
                        FINALIZAR COMPRA
                    </div>
                </a>
                <?php } ?>
            </section>
        </div>
        <!-- MODALS -->
        <?php 
            require_once('../view/modals/cart.php');
        ?>
    </body>

    </html>

<?php }