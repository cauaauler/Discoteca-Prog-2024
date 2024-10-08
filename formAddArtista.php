<?php
$db = new mysqli("localhost", "root", "", "discoteca");
$query =  "select * from artista";
$resultado = $db->query($query);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistas</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="http://localhost/Discoteca-Prog-2024/site/certificado_ouro.png?v=2" type="image/png">
</head>

<body>
    <nav>
        <ul class="navbar">
            <li><a href="index.php">Página Inicial</a></li>
        </ul>
    </nav>

    <div class="artista">
        <div class="formAddArtista">
            <form action="addArtista.php" method="post">
                <label for="Nome">Nome:</label>
                <input type="text" id="Nome" name='Nome' required>
                <br>
                <input type="submit" value="adicionar" name="botao">
            </form>
        </div>

        <div class="listArtista">
            <?php
            echo "<table border='1'>";
            echo "<tr> 
            <td>Nome</td>
            <td>Ações</td>
                </tr>";

            if ($resultado->num_rows == 0) {
                echo "não tem artistas cadastrados";
            } else {
                foreach ($resultado as $linha) {
                    echo "<tr>";
                    echo "<td> {$linha['Nome']}</td>";
                    echo "<td> <a href='delArtista.php?IdArtista={$linha['IdArtista']}'>Eliminar</a> 
                   <a href='form_editArtista.php?idArtista={$linha['IdArtista']}'>Editar</a></td>";
                    echo "</tr>";
                }
            }

            echo "</table>";
            ?>
        </div>
    </div>
</body>

</html>