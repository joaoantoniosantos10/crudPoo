<?php
$totalPagina = ceil($quantidade["cont"] / 5);
$anterior = (($pagina - 1) == 0)? 1 : $pagina -1;
$posterior = (($pagina +1) >= $totalPagina) ? $totalPagina : $pagina+1;
$exibir = 5;
?>

<div id="navegacao">
    <?php
    echo '<a href="?pagina=1">primeira</a> | ';
    echo "<a href=\"?pagina=$anterior\">anterior</a> | ";
    ?>
    <?php
    /**
     * O loop para exibir os valores à esquerda
     */
    for($i = $pagina-$exibir; $i <= $pagina-1; $i++){
        if($i > 0)
            echo '<a href="?pagina='.$i.'"> '.$i.' </a>';
    }

    echo '<a href="?pagina='.$pagina.'"><strong>'.$pagina.'</strong></a>';

    for($i = $pagina+1; $i < $pagina+$exibir; $i++){
        if($i <= $totalPagina)
            echo '<a href="?pagina='.$i.'"> '.$i.' </a>';
    }
    ?>

    <?php echo " | <a href=\"?pagina=$posterior\">próxima</a> | ";
    echo "  <a href=\"?pagina=$totalPagina\">última</a>";
    ?>
