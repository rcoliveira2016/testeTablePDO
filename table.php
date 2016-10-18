<?php
  $b=new PDO("mysql:host=localhost;dbname=add", "root", "");
  $rs=$b->query("select * from usuario");
  $num_total=$rs->rowCount();
  $num_por_pag=10;
  $pag=(isset($_GET['pag']) and !empty($_GET['pag']) and $_GET['pag']!=0)? $_GET['pag'] : 1;
  $init=$num_por_pag*$pag-$num_por_pag;
  $sql="select * from usuario LIMIT $init, $num_por_pag";
  $rs=$b->query($sql);


?>
<table border="1">
  <tr>
    <td>
      id
    </td>
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

  while ($row= $rs->fetch(PDO::FETCH_OBJ)) {
    echo "<tr>";
    echo "  <td>$row->id</td>";
    echo "  <td>$row->nome</td>";
    echo "  <td>$row->unidade</td>";
    echo "  <td>$row->produto</td>";
    echo "  <td>$row->data</td>";
    echo "</tr>";
  }

 ?>
</table>
<?php
  $count=$num_total/$num_por_pag;
  if ($count>0) {
    echo "<p>";
    echo "<span style='border:solid 1px #000;padding:10px'><a href='/src/table/pagina/1'><<</a></span>";
    echo "<span style='border:solid 1px #000;padding:10px'><a href='/src/table/pagina/".((($pag-1)>0)? $pag-1 : 1)."'><</a></span>";
    for ($i=$pag; ($i < ($count) and $i < ($pag+5)) ; $i++) {
      echo "<span style='border:solid 1px #000;padding:10px'><a href='/src/table/pagina/$i'>$i</a></span>";
    }
    echo "<span style='border:solid 1px #000;padding:10px'><a href='/src/table/pagina/".($pag+1)."'>></a></span>";
    echo "<span style='border:solid 1px #000;padding:10px'><a href='/src/table/pagina/$count'>>></a></span>";
    echo "</p>";
  }

 ?>
