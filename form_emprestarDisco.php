<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprestar Disco</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="http://localhost/Discoteca-Prog-2024/site/certificado_ouro.png?v=2" type="image/png">
</head>

<body>
    <nav>
        <ul class="navbar">
            <li><a href="index.php">Página Inicial</a></li>
            <li style="float:right; color: white;">
            </li>
        </ul>
    </nav>

    <h1>Emprestar Disco</h1>
    <div class="formulario">

        <form action="emprestarDisco.php" method="post" class="form">

            <!-- Para conseguir enviar o id para o emprestar -->
            <input type="hidden" id="IdDisco" name="IdDisco" value="<?php echo htmlspecialchars($_GET['idDisco'] ?? ''); ?>">

            <label for="Nome">Nome do cliente:</label>
            <input type="text" id="Nome" name="Nome" required>

            <label for="Email">Email do cliente:</label>
            <input type="email" id="Email" name="Email" required>

            <label for="DevPrevista">Devolução:</label>
            <input type="date" id="DevPrevista" name="DevPrevista">

            <input type="submit" value="Adicionar" name="Adicionar" class="enviar">
        </form>
    </div>

</body>

</html>