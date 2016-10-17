<table border="1">
  <tr>
    <td>
      Nome
    </td>
    <td>
      Unidade
    </td>
    <td>
      Produto
    </td>
    <td>
      Data
    </td>
  </tr>
<?php


  $b=new PDO("mysql:host=localhost;dbname=add", "root", "");
  $rs=$b->query("select * from usuario order by data");
  while ($row= $rs->fetch(PDO::FETCH_OBJ)) {
    echo "<tr>";
    echo "  <td>$row->nome</td>";
    echo "  <td>$row->unidade</td>";
    echo "  <td>$row->produto</td>";
    echo "  <td>$row->data</td>";
    echo "</tr>";
  }

 ?>
</table>
<?php
  // quantidade total menos atual $rowCount-$rowAtual
  $query=$b->query("select * from usuario ");
  $cont=$query->rowCount();
  $cont=($cont > 5)? ($cont/5) : false;
  if ($cont) {
    echo "<p>";
    for ($i=1; ($i < ($cont+1) and $i < 6) ; $i++) {
      echo "<span style='border-ringht:solid 1px #000'>$i</span>";
    }
    echo "</p>";
  }

 ?>
