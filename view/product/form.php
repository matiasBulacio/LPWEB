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
  <form method="POST" action="../../controller/produto/create.php">
    <input type="text" name="descProduto" id="descProduto" placeholder="descProduto">
    <input type="text" name="idModelo" id="idModelo" placeholder="idModelo">
    <input type="text" name="capacidade" id="capacidade" placeholder="capacidade">
    <input type="text" name="vlrSugerido" id="vlrSugerido" placeholder="vlrSugerido">
    <input type="text" name="vlrCusto" id="vlrCusto" placeholder="vlrCusto">
    <input type="text" name="voltagem" id="voltagem" placeholder="voltagem">
    <input type="text" name="idCor" id="idCor" placeholder="idCor">
    <input type="submit">
  </form>
</body>
</html>