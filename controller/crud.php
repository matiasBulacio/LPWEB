<?php
require_once("connection.php");
$result = $conn->query("SELECT * FROM Cor");
?>
<html>

   <header>

      <title>cadastro de cores</title>

   </header>

   <body>

      <h2>CADASTRO DE CORES</h2>

      <p> 
        
         <a href=ins_cor.php>nova cor</a>

      </p>

      <table width="80%" border=0>
        <tr gbcolor='#ddd'>
            <td>Descrição</td>
            <td>Ações</td>
        </tr>

        <?php
            while ($res = $result->fetch()) {
                echo "<tr>";
                echo "<td>".$res["desc_cor"]."</td>";
                echo "<td><a href=\"edit_cor.php?id_cor=$res[id_cor]\"/>Editar</a></td>"
                    ."<td><a href=\"del_cor.php?id_cor=$res[id_cor]\" 
                    onClick=\"return confirm('Tem certeza que deseja deletar esse registro?')\">Deletar</a></td>";
                echo "</tr>";
            }
        ?>
         
      </table>

   </body>

</html>

