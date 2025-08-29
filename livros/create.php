<?php
require_once '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano_publicacao'];
    $id_autor = $_POST['id_autor'];
    $ano_atual = date('Y');
    if ($ano > 1500 && $ano <= $ano_atual) {
        $stmt = $pdo->prepare('INSERT INTO livros (titulo, genero, ano_publicacao, id_autor) VALUES (?, ?, ?, ?)');
        $stmt->execute([$titulo, $genero, $ano, $id_autor]);
        header('Location: index.php');
        exit;
    } else {
        echo "Ano de publicação inválido.";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form method="post">
    Título: <input name="titulo" required><br>
    Gênero: <input name="genero"><br>
    Ano de publicação: <input name="ano_publicacao" type="number" required><br>
    Autor (ID): <input name="id_autor" type="number" required><br>
<button type="submit">Salvar</button>

</form> 
</body>
</html>