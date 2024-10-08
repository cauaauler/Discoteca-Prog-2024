<?php
$db = new mysqli("localhost", "root", "", "discoteca");
$anoAtual = date('Y');

if (isset($_FILES["arquivo"])) {
    if ($_POST['Ano'] > $anoAtual || $_POST['Ano'] < 1850) {
        header('Location: error.php?erro=ano');
    } else if (strlen($_POST['Titulo']) > 50) {
        header('Location: error.php?erro=titulo');
    } else {

        $imageFileType = strtolower(pathinfo($_FILES["arquivo"]["name"], PATHINFO_EXTENSION));
        $extensoesPermitidas = ["jpg", "jpeg", "png", "gif", "bmp", "webp"];
        // $check = getimagesize($_FILES["arquivo"]["tmp_name"]);


        if ($_FILES["arquivo"]["error"] === UPLOAD_ERR_NO_FILE) {
            //Se nenhum arquivo for enviado ou for enviado um arquivo que não é uma imagem válida
            $query = "UPDATE disco SET Titulo = '$_POST[Titulo]', Ano = $_POST[Ano], IdArtista = $_POST[Artista] WHERE IdDisco = $_POST[idDisco]";
            $resultado = $db->query($query);
            header('Location: index.php');
            exit();
        } else if ($_FILES["arquivo"]["error"] === 0 && in_array($imageFileType, $extensoesPermitidas)) {

            //Se algum arquivo for enviado
            $idDisco = $db->insert_id;
            $target_dir = "uploads/";
            //Só permite caracteres de a-z A-Z 0-9
            $novoNomeArquivo = $idDisco . "_" . preg_replace("/[^a-zA-Z0-9]/", "_", $_POST['Titulo']) . "." . $imageFileType;
            // Caminho completo do arquivo
            $target_file = $target_dir . $novoNomeArquivo;

            if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file)) {
                $query = "UPDATE disco SET Titulo = '$_POST[Titulo]', Ano = $_POST[Ano], IdArtista = $_POST[Artista], FotoCapa = '$target_file' WHERE IdDisco = $_POST[idDisco]";
                $resultado = $db->query($query);
                header('Location: index.php');

                exit();
            } else {
                header('Location: error.php?erro=3');
            }
        } else {
            header('Location: error.php?erro=4');
        }
    }
}
