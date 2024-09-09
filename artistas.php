<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistas</title>
    <link rel="stylesheet" href="discos.css">

</head>

<body>
    <nav>
        <ul class="navbar">
            <li><a href="index.php">Página Inicial</a></li>
            <li style="float:right; color: white;">
            </li>
        </ul>
    </nav>

</body>

</html>

<?php
$db = new mysqli("localhost", "root", "", "discoteca");
$query =  "select * from artista";
$resultado = $db->query($query);

echo "<table border border-Style:dashed>";
echo "<tr> 
            <td>Nome</td>
            <td>fazer</td>
            <td>fazer</td>
        </tr>";

if ($resultado->num_rows == 0) {
    echo "não tem artistas cadastrados";
} else {
    foreach ($resultado as $linha) {
        echo "<tr>";
        echo "<td> {$linha['Nome']}</td>";
        echo "<td> <a href='delArtista.php?IdArtista={$linha['IdArtista']}'>Eliminar</a> </td>";
        echo "<td><a href='form_editArtista.php?idArtista={$linha['IdArtista']}'>Editar</a></td>";
        echo "</tr>";
    }
}

echo "</table>";
echo "<a href='form_addArtista.php'>adicionar artista</a>";
echo "<br>";
echo "<a href='index.php'>Voltar</a>";
