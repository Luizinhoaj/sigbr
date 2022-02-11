<?php
    include_once 'conexao.php';
    
    $querySelect = $link->query ("SELECT * FROM acompanhamento ORDER BY IdCodigo");
    while($registros = $querySelect->fetch_assoc()):
        $codigo     = $registros['IdCodigo'];
        $descricao  = $registros['Descricao'];
        $valor      = $registros['Valor'];

        echo "<tr>";
        echo "<td class='rTable-cod'>$codigo</td> 
              <td class='rTable-des'>$descricao</td> 
              <td class='rTable-val'>$valor</td> 
              <td><a href='editar.php?id=$codigo'><i class='fas fa-pen-square'></i><td> 
              <td><a href='banco_de_dados/delete.php?id=$codigo'onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\"><i class='fas fa-trash-alt'></i><td>";
        echo "</tr>";
    endwhile;
?>
