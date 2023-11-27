<?php


require_once("../../controller/connection.php");
require_once("../../models/Produto.php");
$id = $_GET['id'];
$sql = "SELECT * FROM produto WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id', $id);
$product;

try {
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    // Criar e retornar um objeto Produto com os dados do banco de dados
    $product = new Produto($result['id'], $result['desc_produto'], $result['id_modelo'], $result['capacidade'], $result['vlr_sugerido'], $result['vlr_custo'], $result['voltagem'], $result['id_cor'], $result['image']);
  } else {
    echo "Produto não encontrado";
    return null;
  }
} catch (PDOException $e) {
  echo "Erro ao buscar produto: " . $e->getMessage();
  return null;
}

$models = array();
$modelsSQL = 'SELECT * FROM modelo';
try {
  $stmt = $conn->prepare($modelsSQL);
  $stmt->execute();
  $results = $stmt->fetchAll();
} catch (PDOException $e) {
  echo "Erro ao buscar Produto: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div>
    <a href="./index.php">
      voltar
    </a>
  </div>
  <form method="POST" action="../../controller/produto/update.php">
    <?php
    echo "<input type=\"text\" name=\"id\" id=\"id\" placeholder=\"id\" value=\"" . $id . "\"/>";
    echo "<input type=\"text\" name=\"descProduto\" id=\"descProduto\" placeholder=\"descProduto\" value=\"" . $product->getDescProduto() . "\">";
    echo "<input type=\"text\" name=\"capacidade\" id=\"capacidade\" placeholder=\"capacidade\" value=\"" . $product->getCapacidade() . "\">";
    echo "<input type=\"text\" name=\"vlrSugerido\" id=\"vlrSugerido\" placeholder=\"vlrSugerido\" value=\"" . $product->getVlrSugerido() . "\">";
    echo "<input type=\"text\" name=\"vlrCusto\" id=\"vlrCusto\" placeholder=\"vlrCusto\" value=\"" . $product->getVlrCusto() . "\">";
    echo "<input type=\"text\" name=\"voltagem\" id=\"voltagem\" placeholder=\"voltagem\" value=\"" . $product->getVoltagem() . "\">";
    echo "<input type=\"text\" name=\"idCor\" id=\"idCor\" placeholder=\"idCor\" value=\"" . $product->getIdCor() . "\">";
    ?>
    <select name="idModelo">
      <?php
      foreach ($results as $result) {
        // <option value="teste"> php echo $modelo->getDesc(); </option>
        $select = $product->getIdModelo() == $result['id'] ? 'selected="selected"' : '';
        echo "<option ".$select." value=\"" . $result['id'] . "\"> " . $result['desc_modelo'] . " </option>";
      }
      ?>
    </select>
    <input type="submit">
  </form>
</body>

</html>